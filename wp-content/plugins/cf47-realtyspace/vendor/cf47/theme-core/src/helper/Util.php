<?php
namespace cf47\themecore\helper;

class Util
{
    public static function array_map_recursive(callable $func, array $arr)
    {
        array_walk_recursive($arr,
            function (&$v) use ($func) {
                $v = $func($v);
            });

        return $arr;
    }

    public static function include_directory_files($lib_path, $func = null, $pattern = '*.php')
    {

        if (realpath($lib_path) !== $lib_path) {
            // is relative path
            $path = get_template_directory() . '/lib/' . $lib_path . '/' . $pattern;
        } else {
            // is absolute path
            $path = $lib_path . '/' . $pattern;
        }

        if ($func === null) {
            $func = function ($file) {
                require $file;
            };
        }
        $files = glob($path);
        if ($files !== false) {
            foreach ($files as $file) {
                $func($file);
            }
        }
    }

    public static function fetch_directory_files($relative_lib_path, $ext = '*')
    {
        $path = get_template_directory() . '/lib/' . $relative_lib_path . '/*.' . $ext;
        $data = [];
        foreach (glob($path) as $file) {
            $data[] = file_get_contents($file);
        }

        return $data;
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public static function is_active_plugin($name)
    {
        static $plugin_map = [
            'wpml' => 'sitepress-multilingual-cms/sitepress.php',
            'paypal_ipn' => 'paypal-ipn/paypal-ipn-for-wordpress.php'
        ];
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        if (array_key_exists($name, $plugin_map)) {
            $name = $plugin_map[$name];
        } elseif (!self::ends_with($name, '.php')) {
            $name .= "/$name.php";
        }

        return is_plugin_active($name);
    }

    public static function ends_with($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

    public static function required_plugins_active($list)
    {
        if (!function_exists('get_plugins')) {
            require_once ABSPATH . 'wp-admin/includes/plugin.php';
        }

        $plugins = array_keys(get_plugins());
        $required_plugins = $list;

        foreach ($required_plugins as &$required_plugin) {
            if ($required_plugin['required']) {
                $matched = false;
                foreach ($plugins as $key) {
                    if (preg_match('|^' . $required_plugin['slug'] . '/|', $key)) {
                        $matched = true;
                        $status = is_plugin_active($key);
                        if ($status === false) {
                            return false;
                        }
                    }
                }
                if ($matched === false) {
                    return false;
                }
            }
        }

        return true;
    }

    public static function is_assoc_array($array)
    {
        return ($array !== array_values($array));
    }

    public static function nestify_terms(array $terms, $parent = 0)
    {
        $result = [];
        foreach ($terms as $term) {
            if ($parent == $term->parent) {
                $term->children = self::nestify_terms($terms, $term->term_id);
                $result[] = $term;
            }
        }

        return $result;
    }

    /**
     * @param int $min
     * @param int $max
     * @param array $steps
     * @param int $jmp
     *
     * @return array range
     * @throws \InvalidArgumentException
     */
    public static function range_multistep($min, $max, array $steps, $jmp = 10)
    {
        $range = [];
        if (!$steps) {
            return $range;
        }

        if ($min > $max) {
            trigger_error(__FUNCTION__ . '(): Minima and Maxima mal-aligned.', E_USER_NOTICE);
            list($max, $min) = [$min, $max];
        }

        $steps = array_unique($steps);
        sort($steps, SORT_NUMERIC);

        $bigstep = abs($jmp);
        if ($bigstep === 0) {
            throw new \InvalidArgumentException(sprintf('Value %d is invalid for jmp', $jmp));
        }

        $initExponent = ($min > 0) ? floor(log($min, $bigstep)) : 0;

        for ($multiplier = pow($bigstep, $initExponent); ; $multiplier *= $bigstep) {
            foreach ($steps as $step) {
                $num = $step * $multiplier;
                if ($num > $max) {
                    break 2;
                } elseif ($num >= $min) {
                    $range[$num] = 1;
                }
            }
        }

        $range = array_keys($range);
        sort($range, SORT_NUMERIC);

        return $range;
    }

    /**
     * @param array $replacement_pairs
     * @param string $subject
     *
     * @return string
     */
    public static function str_replace_assoc(array $replacement_pairs, $subject)
    {
        return str_replace(array_keys($replacement_pairs), array_values($replacement_pairs), $subject);
    }

    public static function getval(&$var, $default = null)
    {
        return isset($var) ? $var : $default;
    }

    public static function array_filter_key($input, $callback)
    {
        if (!is_array($input)) {
            trigger_error(
                'array_filter_key() expects parameter 1 to be array, ' . gettype($input) . ' given',
                E_USER_WARNING
            );

            return null;
        }

        if (empty($input)) {
            return $input;
        }

        $filteredKeys = array_filter(array_keys($input), $callback);
        if (empty($filteredKeys)) {
            return [];
        }

        $input = array_intersect_key(array_flip($filteredKeys), $input);

        return $input;
    }

    public static function array_column($array, $column_name)
    {
        return array_map(function ($element) use ($column_name) {
            if (is_array($element)) {
                return $element[$column_name];
            }

            if (is_object($element)) {
                if (property_exists($element, $column_name)) {
                    return $element->{$column_name};
                } elseif (method_exists($element, $column_name)) {
                    return $element->{$column_name}();
                }
            }

            return null;
        },
            $array);
    }

    public static function starts_with($haystack, $needle)
    {
        $length = strlen($needle);

        return (substr($haystack, 0, $length) === $needle);
    }

    public static function entities_to_unicode($str)
    {
        $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
        $str = preg_replace_callback("/(&#[0-9]+;)/",
            function ($m) {
                return mb_convert_encoding($m[1], "UTF-8", "HTML-ENTITIES");
            },
            $str);

        return $str;
    }

    public static function validate_url($url)
    {
        $pattern = '_^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})))(?::\d{2,5})?(?:/[^\s]*)?$_iuS';

        return preg_match($pattern, $url);
    }

    public static function get_class_name($classname)
    {
        if ($pos = strrpos($classname, '\\')) {
            return substr($classname, $pos + 1);
        }

        return $pos;
    }

    public static function snake_to_pascal_case($str)
    {
        return str_replace('_', '', self::capitalize_words($str, '_'));
    }

    public static function capitalize_words($words, $charList = null)
    {
        // Use ucwords if no delimiters are given
        if (!isset($charList)) {
            return ucwords($words);
        }

        // Go through all characters
        $capitalizeNext = true;

        for ($i = 0, $max = strlen($words); $i < $max; $i++) {
            if (strpos($charList, $words[$i]) !== false) {
                $capitalizeNext = true;
            } elseif ($capitalizeNext) {
                $capitalizeNext = false;
                $words[$i] = strtoupper($words[$i]);
            }
        }

        return $words;
    }

    public static function pascal_to_snake_case($str)
    {
        $str = lcfirst($str);
        $lc = strtolower($str);
        $result = '';
        $length = strlen($str);
        for ($i = 0; $i < $length; $i++) {
            $result .= ($str[$i] == $lc[$i] ? '' : '_') . $lc[$i];
        }

        return $result;
    }

    public static function humanize($text)
    {
        return ucfirst(trim(strtolower(preg_replace(['/([A-Z])/', '/[_\s\-]+/'], ['_$1', ' '], $text))));
    }

    public static function humanize_number($number)
    {
        $dec_places = pow(10, 0);
        $abbrev = self::number_abbreviations();
        for ($i = count($abbrev) - 1; $i >= 0; $i--) {

            // Convert array index to "1000", "1000000", etc
            $size = pow(10, ($i + 1) * 3);

            // If the number is bigger or equal do the abbreviation
            if ($size <= $number) {
                // Here, we multiply by decPlaces, round, and then divide by decPlaces.
                // This gives us nice rounding to a particular decimal place.
                $number = round($number * $dec_places / $size) / $dec_places;

                // Handle special case where we round up to the next abbreviation
                if (($number == 1000) && ($i < count($abbrev) - 1)) {
                    $number = 1;
                    $i++;
                }

                // Add the letter for the abbreviation
                $number .= $abbrev[$i];

                // We are done... stop
                break;
            }
        }

        return $number;
    }

    public static function number_abbreviations()
    {
        return [
            esc_html__('k', 'cf47placeholder'),
            esc_html__('m', 'cf47placeholder'),
            esc_html__('b', 'cf47placeholder'),
            esc_html__('t', 'cf47placeholder')
        ];
    }

    public static function dashesToCamelCase($string, $capitalizeFirstCharacter = false)
    {

        $str = str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }

    public static function underscoresToCamelCase($string, $capitalizeFirstCharacter = false)
    {

        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $string)));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }

    public static function underscoresToDashes($string)
    {
        return str_replace('_', '-', $string);
    }

    public static function convertPairsToWidgetList(array $pairs)
    {
        $output = [];
        foreach ($pairs as $value => $label) {
            $output[] = ['value' => $value, 'label' => $label];
        }

        return $output;
    }

    public static function prepareSelectList(array $options, $firstEmptyOptionName = null)
    {
        if ($firstEmptyOptionName === null) {
            $options = array_merge(['' => esc_html__('All', 'realtyspace')], $options);
        } elseif ($firstEmptyOptionName !== false) {
            $options = array_merge(['' => $firstEmptyOptionName], $options);
        }

        return $options;
    }

    public static function captureOutput($callable, $postId = false)
    {
        ob_start();

        if ($postId === false) {
            call_user_func($callable);
        } else {
            self::set_post($postId, $callable);
        }

        return ob_get_clean();
    }

    public static function set_post($id, $callable)
    {
        global $post;

        if (!empty($post) && isset($post->ID) && $id === $post->ID) {
            setup_postdata($post);
            $output = $callable();
            wp_reset_postdata();

            return $output;
        }

        $post = get_post($id);
        setup_postdata($post);
        $output = $callable();
        wp_reset_postdata();

        return $output;
    }

    public static function file_upload_max_size()
    {
        static $max_size = -1;

        if ($max_size < 0) {
            // Start with post_max_size.
            $max_size = self::parse_size(ini_get('post_max_size'));

            // If upload_max_size is less, then reduce. Except if upload_max_size is
            // zero, which indicates no limit.
            $upload_max = self::parse_size(ini_get('upload_max_filesize'));
            if ($upload_max > 0 && $upload_max < $max_size) {
                $max_size = $upload_max;
            }
        }

        return $max_size;
    }

    public static function parse_size($size)
    {
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
        $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
        if ($unit) {
            // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
        } else {
            return round($size);
        }
    }

    public static function decamelize($string)
    {
        return strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string));
    }

    public static function array_remove_value(array $array, $value)
    {
        if (($key = array_search($value, $array)) !== false) {
            unset($array[$key]);
        }

        return $array;
    }

    public static function to_int_array($input)
    {
        if (is_scalar($input)) {
            if (self::is_positive_digit($input)) {
                return [$input];
            } elseif (empty($input)) {
                return [];
            } else {
                return Util::string_to_integer_array($input);
            }

        } elseif (is_array($input)) {
            return Util::array_to_integer_array($input);
        }

        return [];
    }

    public static function is_positive_digit($value)
    {
        return (is_int($value) || ctype_digit($value)) && (int)$value > 0;
    }

    /**
     * @param $string
     *
     * @return array
     */
    public static function string_to_integer_array($string, $positive = true, $unique = true)
    {
        $exploded_string = (array)explode(',', $string);

        return self::array_to_integer_array($exploded_string, $positive, $unique);
    }

    public static function array_to_integer_array(array $array, $positive = true, $unique = true)
    {
        $array = array_map($positive ? 'absint' : 'intval', array_filter($array, 'is_numeric'));

        return $unique ? array_unique($array) : $array;
    }

    public static function to_string_array($input)
    {
        $input = trim($input);

        if (!is_scalar($input)) {
            throw new \InvalidArgumentException('String expected');
        }

        if (strpos($input, ',') === false) {
            return [(string)$input];
        }

        $input = explode(',', $input);
        if (!is_array($input)) {
            return [];
        }

        $output = [];
        foreach ($input as $value) {
            $value = trim($value);
            if (strlen($value)) {
                $output[] = $value;
            }
        }

        return $output;
    }
}

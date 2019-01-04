<?php

/* modules/other/sections/counter.twig */
class __TwigTemplate_33e472c2bef00c7053a7630ae06863e5d9221bb575560b8245da507b21e4e1a4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 7
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/other/sections/counter.twig", 7);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "section-widget.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_0c34c47032ce39a31cd5a709aa193f3a0c3c11714132b22f707d86484c242592"] = $this->loadTemplate("macro.twig", "modules/other/sections/counter.twig", 2);
        // line 3
        $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("achievement", array("animate" => true)));
        // line 8
        $context["widget_class"] = "landing achievement";
        // line 7
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "  <!-- BEGIN SECTION ACHIEVEMENT-->
  <div class=\"achievement\">
    ";
        // line 13
        if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "is_vc", array())) {
            // line 14
            echo "      ";
            echo $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "inner_content", array());
            echo "
    ";
        } else {
            // line 16
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "items", array()));
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 17
                echo "        <div class=\"achievement__item\">
          ";
                // line 18
                echo $context["__internal_0c34c47032ce39a31cd5a709aa193f3a0c3c11714132b22f707d86484c242592"]->geticon(twig_escape_filter($this->env, $this->getAttribute($context["item"], "icon", array()), "html_attr"), "achievement__icon");
                echo "
          <div data-count-end=\"";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "number", array()), "html", null, true);
                echo "\" data-count-duration=\"1\"
               class=\"achievement__counter achievement__counter--lg js-count-up\">
            ";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "number", array()), "html", null, true);
                echo "
          </div>
          <div class=\"achievement__counter\">";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "number", array()), "html", null, true);
                echo "</div>
          <div class=\"achievement__name\">";
                // line 24
                echo $this->getAttribute($context["item"], "label", array());
                echo "</div>
        </div>
      ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 27
                echo "        ";
                echo $context["__internal_0c34c47032ce39a31cd5a709aa193f3a0c3c11714132b22f707d86484c242592"]->getno_items_available();
                echo "
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "    ";
        }
        // line 30
        echo "  </div>
  <!-- END SECTION ACHIEVEMENT-->
";
    }

    public function getTemplateName()
    {
        return "modules/other/sections/counter.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 30,  94 => 29,  85 => 27,  77 => 24,  73 => 23,  68 => 21,  63 => 19,  59 => 18,  56 => 17,  50 => 16,  44 => 14,  42 => 13,  38 => 11,  35 => 10,  31 => 7,  29 => 8,  27 => 3,  25 => 2,  11 => 7,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/other/sections/counter.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/modules/other/sections/counter.twig");
    }
}

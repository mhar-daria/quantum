<?php

/* modules/user/includes/header-nav.twig */
class __TwigTemplate_e873e4451b1a3060894a6ea1e12c520ac0cb12e208582d9c85be486f632dda0a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["__internal_535c49d746cbddd79b5bad86611fb8161a089129e6b89450069a61a5a3b2ebe6"] = $this->loadTemplate("modules/user/macro.twig", "modules/user/includes/header-nav.twig", 1);
        // line 2
        if ((isset($context["current_user"]) ? $context["current_user"] : null)) {
            // line 3
            echo "  <nav class=\"nav nav--auth\">
    <ul class=\"nav__list\">
      ";
            // line 5
            if ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "my_properties_page_id", array())) {
                // line 6
                echo "        <li class=\"nav__item\">
          ";
                // line 7
                $context["page"] = $this->getAttribute((isset($context["wpurl"]) ? $context["wpurl"] : null), "page_url_with_name", array(0 => $this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "my_properties_page_id", array())), "method");
                // line 8
                echo "          <a href=\"";
                echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "url", array()), "esc_url"), "html", null, true);
                echo "\" class=\"nav__link\">
            ";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name", array()), "html", null, true);
                echo "
          </a>
        </li>
      ";
            }
            // line 13
            echo "      ";
            if ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "submit_property_page_id", array())) {
                // line 14
                echo "        <li class=\"nav__item\">
          ";
                // line 15
                $context["page"] = $this->getAttribute((isset($context["wpurl"]) ? $context["wpurl"] : null), "page_url_with_name", array(0 => $this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "submit_property_page_id", array())), "method");
                // line 16
                echo "          <a href=\"";
                echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "url", array()), "esc_url"), "html", null, true);
                echo "\" class=\"nav__link\">
            ";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name", array()), "html", null, true);
                echo "
          </a>
        </li>
      ";
            }
            // line 21
            echo "      ";
            if ($this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "profile_page_id", array())) {
                // line 22
                echo "        <li class=\"nav__item\">
          ";
                // line 23
                $context["page"] = $this->getAttribute((isset($context["wpurl"]) ? $context["wpurl"] : null), "page_url_with_name", array(0 => $this->getAttribute((isset($context["layout"]) ? $context["layout"] : null), "profile_page_id", array())), "method");
                // line 24
                echo "          <a href=\"";
                echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "url", array()), "esc_url"), "html", null, true);
                echo "\" class=\"nav__link\">
            ";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "name", array()), "html", null, true);
                echo "
          </a>
        </li>
      ";
            } else {
                // line 29
                echo "        <li class=\"nav__item\">
          <a href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_user"]) ? $context["current_user"] : null), "profile_edit_url", array()), "html", null, true);
                echo "\" class=\"nav__link\">
            ";
                // line 31
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Profile", "realtyspace")), "html", null, true);
                echo "
          </a>
        </li>
      ";
            }
            // line 35
            echo "      <li class=\"nav__item\">
        <a href=\"";
            // line 36
            echo $this->getAttribute((isset($context["current_user"]) ? $context["current_user"] : null), "logout_url", array());
            echo "\" class=\"nav__link\">
          ";
            // line 37
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Log out", "realtyspace")), "html", null, true);
            echo "
        </a>
      </li>
    </ul>
  </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "modules/user/includes/header-nav.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 37,  103 => 36,  100 => 35,  93 => 31,  89 => 30,  86 => 29,  79 => 25,  74 => 24,  72 => 23,  69 => 22,  66 => 21,  59 => 17,  54 => 16,  52 => 15,  49 => 14,  46 => 13,  39 => 9,  34 => 8,  32 => 7,  29 => 6,  27 => 5,  23 => 3,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/user/includes/header-nav.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/modules/user/includes/header-nav.twig");
    }
}

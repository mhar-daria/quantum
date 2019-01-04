<?php

/* partials/auth.twig */
class __TwigTemplate_ed6b8f1af774d63e22cc22ace425c66a5bd3aad6d2142d8f074c011dc17cff9a extends Twig_Template
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
        $context["__internal_8ed5ab57b8c38e6d63b5e14694cc4f6294383e4f14c1f5281408eddeac9ece72"] = $this->loadTemplate("modules/user/macro.twig", "partials/auth.twig", 1);
        // line 2
        echo "<div class=\"auth auth--header\">
  <ul class=\"auth__nav\">
    ";
        // line 4
        if ( !(isset($context["logged_in"]) ? $context["logged_in"] : null)) {
            // line 5
            echo "      <li class=\"dropdown auth__nav-item\">
        <button data-toggle=\"dropdown\" type=\"button\" class=\"dropdown-toggle js-auth-nav-btn auth__nav-btn\">
          <svg class=\"auth__icon-user\">
            <use xlink:href=\"#icon-user\"></use>
          </svg>
          <span class=\"header__span\">";
            // line 10
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Log in", "realtyspace")), "html", null, true);
            echo " ";
            echo (((isset($context["can_register"]) ? $context["can_register"] : null)) ? ("/") : (""));
            echo "</span>
        </button>
        <div class=\"dropdown__menu auth__dropdown--login\">
          ";
            // line 13
            $this->loadTemplate("partials/login.twig", "partials/auth.twig", 13)->display(array_merge($context, array("type" => "dropdown")));
            // line 14
            echo "        </div>
      </li>
      ";
            // line 16
            if ((isset($context["can_register"]) ? $context["can_register"] : null)) {
                // line 17
                echo "        <li class=\"dropdown auth__nav-item\">
          <button data-toggle=\"dropdown\" type=\"button\" class=\"dropdown-toggle auth__nav-btn\">
            <span class=\"header__span\">";
                // line 19
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Sign up", "realtyspace")), "html", null, true);
                echo "</span>
          </button>
          <div class=\"dropdown__menu auth__dropdown--register\">
            ";
                // line 22
                $this->loadTemplate("partials/register.twig", "partials/auth.twig", 22)->display(array_merge($context, array("type" => "dropdown")));
                // line 23
                echo "          </div>
        </li>
      ";
            }
            // line 26
            echo "    ";
        } else {
            // line 27
            echo "      <li class=\"dropdown auth__nav-item\">
        <button data-toggle=\"dropdown\" type=\"button\" class=\"dropdown-toggle js-auth-nav-btn auth__nav-btn\">
          ";
            // line 29
            echo $context["__internal_8ed5ab57b8c38e6d63b5e14694cc4f6294383e4f14c1f5281408eddeac9ece72"]->getavatar($this->getAttribute((isset($context["current_user"]) ? $context["current_user"] : null), "id", array()), 50, "auth__avatar");
            echo "
          <span class=\"auth__name\">
            ";
            // line 31
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Hi", "realtyspace")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_user"]) ? $context["current_user"] : null), "name", array()), "html", null, true);
            echo "
          </span>
        </button>
        <div class=\"dropdown__menu auth__dropdown--logged-in js-user-logged-in\">
          ";
            // line 35
            echo twig_include($this->env, $context, "modules/user/includes/header-nav.twig");
            echo "
        </div>
      </li>
    ";
        }
        // line 39
        echo "  </ul>
  <!-- end of block .auth header-->
</div>";
    }

    public function getTemplateName()
    {
        return "partials/auth.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 39,  88 => 35,  79 => 31,  74 => 29,  70 => 27,  67 => 26,  62 => 23,  60 => 22,  54 => 19,  50 => 17,  48 => 16,  44 => 14,  42 => 13,  34 => 10,  27 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/auth.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/partials/auth.twig");
    }
}

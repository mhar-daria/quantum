<?php

/* partials/login.twig */
class __TwigTemplate_4a3a3b3d0d69b08c40ea678479c67c23e06278989e6417e7d95431517af6cdd2 extends Twig_Template
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
        echo "<!-- BEGIN AUTH LOGIN-->

<h5 class=\"auth__title\">";
        // line 3
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Login in your account", "realtyspace")), "html", null, true);
        echo "</h5>
";
        // line 4
        if (((isset($context["type"]) ? $context["type"] : null) == "inline")) {
            // line 5
            echo "  <p class=\"alert alert-info\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("This page is available for authentificated users only!", "realtyspace")), "html", null, true);
            echo "</p>
";
        }
        // line 7
        echo "<form action=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("site_url", "wp-login.php", "login-post")), "html", null, true);
        echo "\" class=\"form form--auth js-login-form\">
  <div class=\"row\">
    <div class=\"form-group\">
      <label for=\"login-username-";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
        echo "\" class=\"control-label\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Username", "realtyspace")), "html", null, true);
        echo "</label>
      <input type=\"text\" name=\"log\" id=\"login-username-";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
        echo "\" required class=\"form-control\">
    </div>
    <div class=\"form-group\">
      <label for=\"login-password-";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
        echo "\" class=\"control-label\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Password", "realtyspace")), "html", null, true);
        echo "</label>
      <input type=\"password\" name=\"pwd\" id=\"login-password-";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
        echo "\" required class=\"form-control\">
    </div>
  </div>
  ";
        // line 18
        call_user_func_array($this->env->getFunction('action')->getCallable(), array($context, "wordpress_social_login"));
        // line 19
        echo "  <div class=\"row\">
    <div class=\"form__options form__options--forgot\">
      <a href=\"";
        // line 21
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('fn')->getCallable(), array("wp_lostpassword_url")), "html", null, true);
        echo "\" class=\"auth__forgot\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Forgot password?", "realtyspace")), "html", null, true);
        echo "</a>
    </div>
    <button type=\"submit\" class=\"form__submit\">";
        // line 23
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Sign in", "realtyspace")), "html", null, true);
        echo "</button>
  </div>
  <span class=\"form__remember\">
    <input id=\"remember-in-";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
        echo "\" name=\"rememberme\" type=\"checkbox\" class=\"in-checkbox\" value=\"forever\">
    <label for=\"remember-in-";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : null), "html", null, true);
        echo "\" class=\"in-label\">";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Remember me", "realtyspace")), "html", null, true);
        echo "</label>
  </span>
  ";
        // line 29
        if ((isset($context["can_register"]) ? $context["can_register"] : null)) {
            // line 30
            echo "    <div class=\"row\">
      <div class=\"form__options\">
        ";
            // line 32
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Not a user yet?", "realtyspace")), "html", null, true);
            echo "
        ";
            // line 33
            $context["label"] = call_user_func_array($this->env->getFunction('__')->getCallable(), array("Get an account", "realtyspace"));
            // line 34
            echo "        ";
            if (((isset($context["type"]) ? $context["type"] : null) == "dropdown")) {
                // line 35
                echo "          <button type=\"button\" class=\"js-user-register\">";
                echo twig_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
                echo "</button>
        ";
            } else {
                // line 37
                echo "          <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["wpurl"]) ? $context["wpurl"] : null), "url", array(0 => "/register/"), "method"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["label"]) ? $context["label"] : null), "html", null, true);
                echo "</a>
        ";
            }
            // line 39
            echo "      </div>
    </div>
  ";
        }
        // line 42
        echo "  ";
        echo call_user_func_array($this->env->getFunction('nonce_field')->getCallable(), array("ajax-login"));
        echo "
  ";
        // line 43
        if ($this->getAttribute($this->getAttribute((isset($context["wprequest"]) ? $context["wprequest"] : null), "query", array()), "has", array(0 => "redirect_to"), "method")) {
            // line 44
            echo "    <input type=\"hidden\" name=\"redirect_to\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["wprequest"]) ? $context["wprequest"] : null), "query", array()), "get", array(0 => "redirect_to"), "method"), "html", null, true);
            echo "\">
  ";
        }
        // line 46
        echo "</form>

<!-- end of block .auth__form-->
<!-- END AUTH LOGIN-->
";
    }

    public function getTemplateName()
    {
        return "partials/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 46,  137 => 44,  135 => 43,  130 => 42,  125 => 39,  117 => 37,  111 => 35,  108 => 34,  106 => 33,  102 => 32,  98 => 30,  96 => 29,  89 => 27,  85 => 26,  79 => 23,  72 => 21,  68 => 19,  66 => 18,  60 => 15,  54 => 14,  48 => 11,  42 => 10,  35 => 7,  29 => 5,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/login.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/partials/login.twig");
    }
}

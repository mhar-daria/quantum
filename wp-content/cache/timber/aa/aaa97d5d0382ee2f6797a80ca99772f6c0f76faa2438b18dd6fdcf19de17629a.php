<?php

/* partials/footer.twig */
class __TwigTemplate_26a9c25c99e933427bec6c8df5a84382ccfad8449789c1bfe157e2aa2df459d4 extends Twig_Template
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
        echo "<footer class=\"footer\">
  <div class=\"container\">
    <div class=\"footer__wrap\">
      <div class=\"footer__col footer__col--first\">
        ";
        // line 5
        echo call_user_func_array($this->env->getFunction('dynamic_sidebar')->getCallable(), array("cf47rs-footer-col-1"));
        echo "
      </div>
      <div class=\"footer__col footer__col--second\">
        ";
        // line 8
        echo call_user_func_array($this->env->getFunction('dynamic_sidebar')->getCallable(), array("cf47rs-footer-col-2"));
        echo "
      </div>
      <div class=\"footer__col footer__col--third\">
        ";
        // line 11
        echo call_user_func_array($this->env->getFunction('dynamic_sidebar')->getCallable(), array("cf47rs-footer-col-3"));
        echo "
      </div>
      <div class=\"clearfix\"></div>
    </div>
    ";
        // line 15
        if (($this->getAttribute((isset($context["option"]) ? $context["option"] : null), "footer_copyright_text", array()) != "")) {
            // line 16
            echo "      <span class=\"footer__copyright\"> ";
            echo $this->getAttribute((isset($context["option"]) ? $context["option"] : null), "footer_copyright_text", array());
            echo "</span>
    ";
        } else {
            // line 18
            echo "      <span class=\"footer__copyright\"> &copy; ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('date')->getCallable(), array((isset($context["now"]) ? $context["now"] : null), "Y")), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('bloginfo')->getCallable(), array("name")), "html", null, true);
            echo ". ";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("All rights reserved.", "realtyspace")), "html", null, true);
            echo "</span>
    ";
        }
        // line 20
        echo "  </div>
</footer>
";
    }

    public function getTemplateName()
    {
        return "partials/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 20,  52 => 18,  46 => 16,  44 => 15,  37 => 11,  31 => 8,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<footer class=\"footer\">
  <div class=\"container\">
    <div class=\"footer__wrap\">
      <div class=\"footer__col footer__col--first\">
        {{ dynamic_sidebar('cf47rs-footer-col-1') }}
      </div>
      <div class=\"footer__col footer__col--second\">
        {{ dynamic_sidebar('cf47rs-footer-col-2') }}
      </div>
      <div class=\"footer__col footer__col--third\">
        {{ dynamic_sidebar('cf47rs-footer-col-3') }}
      </div>
      <div class=\"clearfix\"></div>
    </div>
    {% if option.footer_copyright_text != '' %}
      <span class=\"footer__copyright\"> {{ option.footer_copyright_text|raw }}</span>
    {% else %}
      <span class=\"footer__copyright\"> &copy; {{ now|date('Y') }} {{ bloginfo('name') }}. {{ __('All rights reserved.', 'realtyspace') }}</span>
    {% endif %}
  </div>
</footer>
", "partials/footer.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/partials/footer.twig");
    }
}

<?php

/* modules/contact/widgets/contact-info/widget.twig */
class __TwigTemplate_289cd1979cb76bd04a6b80e21ec2b3b8d1b4994de2438d2fb43c081c4b177a96 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("widget.twig", "modules/contact/widgets/contact-info/widget.twig", 3);
        $this->blocks = array(
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "widget.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["__internal_fd0d4935947de8cc9f2be03fd378cfe0e4c2ffbbb304bd272364ed72f601927f"] = $this->loadTemplate("macro.twig", "modules/contact/widgets/contact-info/widget.twig", 1);
        // line 3
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        // line 6
        echo "  ";
        echo $context["__internal_fd0d4935947de8cc9f2be03fd378cfe0e4c2ffbbb304bd272364ed72f601927f"]->getwidget_header((isset($context["title"]) ? $context["title"] : null), (isset($context["subtext"]) ? $context["subtext"] : null), $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()));
        echo "
";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "  <address class=\"address address--";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["widget"]) ? $context["widget"] : null), "modifier", array()), "html", null, true);
        echo "\">
    <div class=\"address__main\">
      ";
        // line 12
        if ((isset($context["address"]) ? $context["address"] : null)) {
            // line 13
            echo "        <span>";
            echo twig_escape_filter($this->env, (isset($context["address"]) ? $context["address"] : null), "html", null, true);
            echo "</span>
      ";
        }
        // line 15
        echo "      ";
        if ((isset($context["hours"]) ? $context["hours"] : null)) {
            // line 16
            echo "        <span>";
            echo twig_escape_filter($this->env, (isset($context["hours"]) ? $context["hours"] : null), "html", null, true);
            echo "</span>
      ";
        }
        // line 18
        echo "      ";
        if ((isset($context["phone"]) ? $context["phone"] : null)) {
            // line 19
            echo "        <a href=\"tel:";
            echo twig_escape_filter($this->env, twig_replace_filter((isset($context["phone"]) ? $context["phone"] : null), array(" " => "")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["phone"]) ? $context["phone"] : null), "html", null, true);
            echo "</a>
      ";
        }
        // line 21
        echo "      ";
        if ((isset($context["cellphone"]) ? $context["cellphone"] : null)) {
            // line 22
            echo "        <a href=\"tel:";
            echo twig_escape_filter($this->env, twig_replace_filter((isset($context["cellphone"]) ? $context["cellphone"] : null), array(" " => "")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["cellphone"]) ? $context["cellphone"] : null), "html", null, true);
            echo "</a>
      ";
        }
        // line 24
        echo "      ";
        if ((isset($context["fax"]) ? $context["fax"] : null)) {
            // line 25
            echo "        <span>";
            echo twig_escape_filter($this->env, (isset($context["fax"]) ? $context["fax"] : null), "html", null, true);
            echo "</span>
      ";
        }
        // line 27
        echo "      ";
        if ((isset($context["email"]) ? $context["email"] : null)) {
            // line 28
            echo "        <a href=\"mailto:";
            echo antispambot((isset($context["email"]) ? $context["email"] : null));
            echo "\">";
            echo antispambot((isset($context["email"]) ? $context["email"] : null));
            echo "</a>
      ";
        }
        // line 30
        echo "    </div>
    ";
        // line 31
        if ((isset($context["html"]) ? $context["html"] : null)) {
            // line 32
            echo "      ";
            echo (isset($context["html"]) ? $context["html"] : null);
            echo "
    ";
        }
        // line 34
        echo "  </address>
";
    }

    public function getTemplateName()
    {
        return "modules/contact/widgets/contact-info/widget.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 34,  115 => 32,  113 => 31,  110 => 30,  102 => 28,  99 => 27,  93 => 25,  90 => 24,  82 => 22,  79 => 21,  71 => 19,  68 => 18,  62 => 16,  59 => 15,  53 => 13,  51 => 12,  45 => 10,  42 => 9,  35 => 6,  32 => 5,  28 => 3,  26 => 1,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/contact/widgets/contact-info/widget.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace-child/views/modules/contact/widgets/contact-info/widget.twig");
    }
}

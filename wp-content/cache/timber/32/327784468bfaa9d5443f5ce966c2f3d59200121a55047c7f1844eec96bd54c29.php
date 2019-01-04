<?php

/* modules/property/sections/call-to-action.twig */
class __TwigTemplate_6ba5749f7154d27dbd63200a4864eb263fd1331b2562128f2a38d15c1729dcbc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 7
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/property/sections/call-to-action.twig", 7);
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
        // line 3
        $context["module_id"] = call_user_func_array($this->env->getFunction('js_module')->getCallable(), array("goSubmit", array("animate" => true)));
        // line 7
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "  <!-- BEGIN BLOCK GO SUBMIT-->
  <div class=\"gosubmit\">
    <div class=\"container\">
      ";
        // line 13
        if ( !$this->getAttribute((isset($context["section"]) ? $context["section"] : null), "is_vc", array())) {
            // line 14
            echo "        <div class=\"gosubmit__title\">
          ";
            // line 15
            echo $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "text", array());
            echo "
        </div>
        <!-- end of block .gosubmit__title-->
        ";
            // line 18
            if ($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "button_page_link", array())) {
                // line 19
                echo "          ";
                $context["button_page"] = $this->getAttribute((isset($context["wpurl"]) ? $context["wpurl"] : null), "page_url_with_name", array(0 => $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "button_page_link", array())), "method");
                // line 20
                echo "          <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["button_page"]) ? $context["button_page"] : null), "url", array()), "html", null, true);
                echo "\" class=\"gosubmit__btn\">";
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "button_text", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["section"]) ? $context["section"] : null), "button_text", array()), $this->getAttribute((isset($context["button_page"]) ? $context["button_page"] : null), "name", array()))) : ($this->getAttribute((isset($context["button_page"]) ? $context["button_page"] : null), "name", array()))), "html", null, true);
                echo "</a>
        ";
            }
            // line 22
            echo "      ";
        } else {
            // line 23
            echo "        ";
            echo $this->getAttribute((isset($context["section"]) ? $context["section"] : null), "text", array());
            echo "
      ";
        }
        // line 25
        echo "    </div>
  </div>
  <!-- END BLOCK GO SUBMIT-->
";
    }

    public function getTemplateName()
    {
        return "modules/property/sections/call-to-action.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 25,  66 => 23,  63 => 22,  55 => 20,  52 => 19,  50 => 18,  44 => 15,  41 => 14,  39 => 13,  34 => 10,  31 => 9,  27 => 7,  25 => 3,  11 => 7,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/property/sections/call-to-action.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/plugins/cf47-realtyspace/views/modules/property/sections/call-to-action.twig");
    }
}

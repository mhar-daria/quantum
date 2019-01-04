<?php

/* modules/agent/pages/single/includes/agent-info.twig */
class __TwigTemplate_0d352594a4331fec00c036527d9619405a5a7e5340af34e2dd113c769c4e3949 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 5
        $this->parent = $this->loadTemplate("section-widget.twig", "modules/agent/pages/single/includes/agent-info.twig", 5);
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
        // line 1
        $context["__internal_1e850744623b19a1f7e5072a9f0b38bad9c1859174682f7ae42c3410b85558b7"] = $this->loadTemplate("modules/agent/pages/single/macro.twig", "modules/agent/pages/single/includes/agent-info.twig", 1);
        // line 7
        $context["widget_class"] = "main";
        // line 5
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "  <div class=\"worker worker--list worker--details js-unhide-block\">
    <div data-animate-end=\"animate-end\" class=\"worker__item vcard\">
      ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["agent_macro"]) ? $context["agent_macro"] : null), "photo", array(0 => (isset($context["agent"]) ? $context["agent"] : null), 1 => 500, 2 => 480, 3 => false), "method"), "html", null, true);
        echo "
      <div class=\"worker__intro\">
        <div class=\"worker__intro-head\">
          <div class=\"worker__intro-name\">
            ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["agent_macro"]) ? $context["agent_macro"] : null), "name_and_title", array(0 => (isset($context["agent"]) ? $context["agent"] : null)), "method"), "html", null, true);
        echo "
          </div>

          <button type=\"button\" class=\"worker__show js-unhide\">";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Contact agent", "realtyspace")), "html", null, true);
        echo "</button>
        </div>
        <div class=\"worker__intro-row\">
          <div class=\"worker__intro-col\">
            ";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["agent_macro"]) ? $context["agent_macro"] : null), "contacts", array(0 => (isset($context["agent"]) ? $context["agent"] : null)), "method"), "html", null, true);
        echo "
          </div>
          <div class=\"worker__intro-col\">
            ";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["agent_macro"]) ? $context["agent_macro"] : null), "social", array(0 => (isset($context["agent"]) ? $context["agent"] : null)), "method"), "html", null, true);
        echo "
          </div>
        </div>
      </div>
      <div class=\"worker__descr\">";
        // line 30
        echo $this->getAttribute((isset($context["agent"]) ? $context["agent"] : null), "content", array());
        echo "</div>
      <!-- end of block .worker__descr-->
      <div class=\"clearfix\"></div>
    </div>
    <!-- end of block .worker__item-->


    ";
        // line 37
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "show_contact_form", array()) &&  !twig_test_empty($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "cf7_form", array())))) {
            // line 38
            echo "      <div class=\"widget js-widget widget--details\">
        <div class=\"widget__header\">
          <h3 class=\"widget__title\">";
            // line 40
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('__')->getCallable(), array("Contact the Agent", "realtyspace")), "html", null, true);
            echo "</h3>
        </div>
        <div class=\"widget__content\">
          <div class=\"form\">
            ";
            // line 44
            echo $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "cf7_form", array());
            echo "
          </div>
          <!-- end of block form-->
        </div>
      </div>
    ";
        }
        // line 50
        echo "  </div>
";
    }

    public function getTemplateName()
    {
        return "modules/agent/pages/single/includes/agent-info.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 50,  96 => 44,  89 => 40,  85 => 38,  83 => 37,  73 => 30,  66 => 26,  60 => 23,  53 => 19,  47 => 16,  40 => 12,  36 => 10,  33 => 9,  29 => 5,  27 => 7,  25 => 1,  11 => 5,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/agent/pages/single/includes/agent-info.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/agent/pages/single/includes/agent-info.twig");
    }
}

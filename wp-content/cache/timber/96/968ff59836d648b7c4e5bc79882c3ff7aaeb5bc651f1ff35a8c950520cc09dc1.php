<?php

/* /modules/core/login.twig */
class __TwigTemplate_21c4d85bbef70aa23fa376535fd35133e4e1121c05bd55b671c100575b78cf3a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "/modules/core/login.twig", 1);
        $this->blocks = array(
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_container($context, array $blocks = array())
    {
        // line 4
        echo "  <div class=\"center\">
    <div class=\"container\">
      <div class=\"row\">
        <section class=\"site\">
          <div class=\"site__main\">
            <div class=\"widget js-widget widget--main widget--no-border\">
              <div class=\"widget__content\">
                <div class=\"auth auth--inline\">
                  <div class=\"auth__wrap auth__wrap--login\">
                    ";
        // line 13
        $this->loadTemplate("partials/login.twig", "/modules/core/login.twig", 13)->display(array_merge($context, array("type" => "inline")));
        // line 14
        echo "                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "/modules/core/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 14,  42 => 13,  31 => 4,  28 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "/modules/core/login.twig", "/Users/xeijz23/Documents/Applications/quantum/public_html/wp-content/themes/themeforest-15965811-realtyspace-real-estate-wordpress-theme/realtyspace/views/modules/core/login.twig");
    }
}

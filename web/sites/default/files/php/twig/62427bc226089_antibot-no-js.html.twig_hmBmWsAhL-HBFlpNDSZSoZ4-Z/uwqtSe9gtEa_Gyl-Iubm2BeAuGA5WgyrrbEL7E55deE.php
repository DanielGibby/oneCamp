<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/contrib/antibot/templates/antibot-no-js.html.twig */
class __TwigTemplate_85ba990942f81e2e942f0d53366a598b0c358de3c0a6c78ba9edf9f680d22836 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "<noscript>
  <div class=\"antibot-no-js antibot-message antibot-message-warning\">";
        // line 15
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["message"] ?? null), 15, $this->source), "html", null, true);
        echo "</div>
</noscript>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/antibot/templates/antibot-no-js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 15,  39 => 14,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file antibot-no-js.html.twig
 * Theme implementation to present markup inside Antibot-protected forms.
 *
 * The purpose is to show a message to users without Javascript.
 *
 * Available variables:
 * - message: The message text that is shown to non-JS users.
 *
 * @ingroup themeable
 */
#}
<noscript>
  <div class=\"antibot-no-js antibot-message antibot-message-warning\">{{ message }}</div>
</noscript>
", "modules/contrib/antibot/templates/antibot-no-js.html.twig", "C:\\Bitnami\\wampstack-7.4.27-0\\apache2\\htdocs\\onecamp\\web\\modules\\contrib\\antibot\\templates\\antibot-no-js.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 15);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}

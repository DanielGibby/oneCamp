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

/* core/themes/stable/templates/admin/tablesort-indicator.html.twig */
class __TwigTemplate_e63489c8ed28e8663318381ea52e2ccd0dd51e661a599f8a2436d0f226050662 extends \Twig\Template
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
        // line 11
        $context["classes"] = [0 => "tablesort", 1 => ("tablesort--" . $this->sandbox->ensureToStringAllowed(        // line 13
($context["style"] ?? null), 13, $this->source))];
        // line 16
        echo "<span";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 16), 16, $this->source), "html", null, true);
        echo ">
  <span class=\"visually-hidden\">
    ";
        // line 18
        if ((($context["style"] ?? null) == "asc")) {
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Sort ascending"));
            echo "
    ";
        } else {
            // line 21
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Sort descending"));
            echo "
    ";
        }
        // line 23
        echo "  </span>
</span>
";
    }

    public function getTemplateName()
    {
        return "core/themes/stable/templates/admin/tablesort-indicator.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 23,  55 => 21,  50 => 19,  48 => 18,  42 => 16,  40 => 13,  39 => 11,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for displaying a tablesort indicator.
 *
 * Available variables:
 * - style: Either 'asc' or 'desc', indicating the sorting direction.
 */
#}
{%
  set classes = [
    'tablesort',
    'tablesort--' ~ style,
  ]
%}
<span{{ attributes.addClass(classes) }}>
  <span class=\"visually-hidden\">
    {% if style == 'asc' -%}
      {{ 'Sort ascending'|t }}
    {% else -%}
      {{ 'Sort descending'|t }}
    {% endif %}
  </span>
</span>
", "core/themes/stable/templates/admin/tablesort-indicator.html.twig", "C:\\Bitnami\\wampstack-7.4.27-0\\apache2\\htdocs\\onecamp\\web\\core\\themes\\stable\\templates\\admin\\tablesort-indicator.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 11, "if" => 18);
        static $filters = array("escape" => 16, "t" => 19);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 't'],
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

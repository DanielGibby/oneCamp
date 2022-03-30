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

/* themes/custom/scouts/includes/footer.html.twig */
class __TwigTemplate_20b38654394b9aa9d530cd7389fba04d26d0de50adcd00349051f194b970d6db extends \Twig\Template
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
        // line 2
        $context["footer_classes"] = (((" " . (((        // line 3
($context["b5_footer_schema"] ?? null) != "none")) ? ((" footer-" . $this->sandbox->ensureToStringAllowed(($context["b5_footer_schema"] ?? null), 3, $this->source))) : (" "))) . (((        // line 4
($context["b5_footer_schema"] ?? null) != "none")) ? ((((($context["b5_footer_schema"] ?? null) == "dark")) ? (" text-light") : (" text-dark"))) : (" "))) . (((        // line 5
($context["b5_footer_bg_schema"] ?? null) != "none")) ? ((" bg-" . $this->sandbox->ensureToStringAllowed(($context["b5_footer_bg_schema"] ?? null), 5, $this->source))) : (" ")));
        // line 7
        echo "
";
        // line 8
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 8)) {
            // line 9
            echo "\t<footer class=\"mt-auto ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_classes"] ?? null), 9, $this->source), "html", null, true);
            echo "\">
\t\t<div class=\"";
            // line 10
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["b5_top_container"] ?? null), 10, $this->source), "html", null, true);
            echo "\">
\t\t\t<div class=\"container\">
\t\t\t\t";
            // line 12
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer", [], "any", false, false, true, 12), 12, $this->source), "html", null, true);
            echo "
\t\t\t</div>
\t\t</div>
\t</footer>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/custom/scouts/includes/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 12,  54 => 10,  49 => 9,  47 => 8,  44 => 7,  42 => 5,  41 => 4,  40 => 3,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
set footer_classes = ' ' ~
  (b5_footer_schema != 'none' ? \" footer-#{b5_footer_schema}\" : ' ') ~
  (b5_footer_schema != 'none' ? (b5_footer_schema == 'dark' ? ' text-light' : ' text-dark' ) : ' ') ~
  (b5_footer_bg_schema != 'none' ? \" bg-#{b5_footer_bg_schema}\" : ' ')
%}

{% if page.footer %}
\t<footer class=\"mt-auto {{ footer_classes }}\">
\t\t<div class=\"{{ b5_top_container }}\">
\t\t\t<div class=\"container\">
\t\t\t\t{{ page.footer }}
\t\t\t</div>
\t\t</div>
\t</footer>
{% endif %}", "themes/custom/scouts/includes/footer.html.twig", "C:\\Bitnami\\wampstack-7.4.27-0\\apache2\\htdocs\\onecamp\\web\\themes\\custom\\scouts\\includes\\footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 2, "if" => 8);
        static $filters = array("escape" => 9);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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

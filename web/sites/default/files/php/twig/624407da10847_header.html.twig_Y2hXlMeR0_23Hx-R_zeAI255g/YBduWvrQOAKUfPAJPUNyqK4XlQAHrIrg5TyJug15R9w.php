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

/* themes/custom/scouts/includes/header.html.twig */
class __TwigTemplate_ba569ba7c38d495ce88e221d3d06d72703d97bf05f3ad54a08639ae5e9051474 extends \Twig\Template
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
        $context["nav_classes"] = ((("navbar navbar-expand-lg" . (((        // line 3
($context["b5_navbar_schema"] ?? null) != "none")) ? ((" navbar-" . $this->sandbox->ensureToStringAllowed(($context["b5_navbar_schema"] ?? null), 3, $this->source))) : (" "))) . (((        // line 4
($context["b5_navbar_schema"] ?? null) != "none")) ? ((((($context["b5_navbar_schema"] ?? null) == "dark")) ? (" text-light") : (" text-dark"))) : (" "))) . (((        // line 5
($context["b5_navbar_bg_schema"] ?? null) != "none")) ? ((" bg-" . $this->sandbox->ensureToStringAllowed(($context["b5_navbar_bg_schema"] ?? null), 5, $this->source))) : (" ")));
        // line 7
        echo "

<header>
\t<div class=\"container no-gutters\">
\t\t";
        // line 11
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
        echo "
        ";
        // line 12
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, views_embed_view("user_profile_block", "user_block", $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, true, 12), 12, $this->source)), "html", null, true);
        echo "
\t\t";
        // line 13
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_branding", [], "any", false, false, true, 13) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 13)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_additional", [], "any", false, false, true, 13))) {
            // line 14
            echo "\t\t\t<nav class=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nav_classes"] ?? null), 14, $this->source), "html", null, true);
            echo "\">
\t\t\t\t<div class=\"";
            // line 15
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["b5_top_container"] ?? null), 15, $this->source), "html", null, true);
            echo " d-flex\">
\t\t\t\t\t";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_branding", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "

\t\t\t\t\t<button class=\"navbar-toggler collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t\t</button>

\t\t\t\t\t<div class=\"collapse navbar-collapse justify-content-md-end flex-wrap\" id=\"navbarSupportedContent\">
\t\t\t\t\t\t";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_main", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
            echo "
\t\t\t\t\t\t";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "nav_additional", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</nav>
\t\t";
        }
        // line 29
        echo "\t</div>
</header>";
    }

    public function getTemplateName()
    {
        return "themes/custom/scouts/includes/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 29,  83 => 24,  79 => 23,  69 => 16,  65 => 15,  60 => 14,  58 => 13,  54 => 12,  50 => 11,  44 => 7,  42 => 5,  41 => 4,  40 => 3,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{%
set nav_classes = 'navbar navbar-expand-lg' ~
  (b5_navbar_schema != 'none' ? \" navbar-#{b5_navbar_schema}\" : ' ') ~
  (b5_navbar_schema != 'none' ? (b5_navbar_schema == 'dark' ? ' text-light' : ' text-dark' ) : ' ') ~
  (b5_navbar_bg_schema != 'none' ? \" bg-#{b5_navbar_bg_schema}\" : ' ')
%}


<header>
\t<div class=\"container no-gutters\">
\t\t{{ page.header }}
        {{ drupal_view('user_profile_block', 'user_block', user.id) }}
\t\t{% if page.nav_branding or page.nav_main or page.nav_additional %}
\t\t\t<nav class=\"{{ nav_classes }}\">
\t\t\t\t<div class=\"{{ b5_top_container }} d-flex\">
\t\t\t\t\t{{ page.nav_branding }}

\t\t\t\t\t<button class=\"navbar-toggler collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t\t</button>

\t\t\t\t\t<div class=\"collapse navbar-collapse justify-content-md-end flex-wrap\" id=\"navbarSupportedContent\">
\t\t\t\t\t\t{{ page.nav_main }}
\t\t\t\t\t\t{{ page.nav_additional }}
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</nav>
\t\t{% endif %}
\t</div>
</header>", "themes/custom/scouts/includes/header.html.twig", "C:\\Bitnami\\wampstack-7.4.27-0\\apache2\\htdocs\\onecamp\\web\\themes\\custom\\scouts\\includes\\header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 2, "if" => 13);
        static $filters = array("escape" => 11);
        static $functions = array("drupal_view" => 12);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape'],
                ['drupal_view']
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

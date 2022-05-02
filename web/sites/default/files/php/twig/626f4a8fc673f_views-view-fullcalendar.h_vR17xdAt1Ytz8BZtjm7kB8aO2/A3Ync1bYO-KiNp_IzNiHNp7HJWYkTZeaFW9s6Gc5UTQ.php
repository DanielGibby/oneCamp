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

/* modules/contrib/fullcalendar_view/templates/views-view-fullcalendar.html.twig */
class __TwigTemplate_226249b6daeb6217839cffe6226242f9193b58aa238a748e6cdd4d0f3ed0b72f extends \Twig\Template
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
        // line 22
        $context["classes"] = [0 => twig_get_attribute($this->env, $this->source,         // line 23
($context["options"] ?? null), "classes", [], "any", false, false, true, 23)];
        // line 26
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 26), 26, $this->source), "html", null, true);
        echo ">
  <div class=\"js-drupal-fullcalendar\" calendar-view-index=\"";
        // line 27
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["view_index"] ?? null), 27, $this->source), "html", null, true);
        echo "\" calendar-view-name=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["view_id"] ?? null), 27, $this->source), "html", null, true);
        echo "\" calendar-display=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["display_id"] ?? null), 27, $this->source), "html", null, true);
        echo "\"></div>
  <div class=\"bottom-buttons fc-button-group\">
    ";
        // line 29
        if (($context["showAddEvent"] ?? null)) {
            // line 30
            echo "    <div class=\"fullcalendar-bottom-btn add-event-btn\">
        <a id=\"calendar-add-event\"  href=\"fullcalendar-view-event-add?entity=";
            // line 31
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["entity_id"] ?? null), 31, $this->source), "html", null, true);
            echo "&bundle=";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "bundle_type", [], "any", false, false, true, 31), 31, $this->source), "html", null, true);
            echo "&start_field=";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "start", [], "any", false, false, true, 31), 31, $this->source), "html", null, true);
            echo "&end_field=";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "end", [], "any", false, false, true, 31), 31, $this->source), "html", null, true);
            echo "&destination=";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<current>"));
            echo "\" class=\"use-ajax\" data-dialog-type=\"dialog\" data-dialog-renderer=\"off_canvas\" 
   data-dialog-options=\"{&quot;width&quot;:400}\">";
            // line 32
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Add event"));
            echo "</a>
    </div>
    ";
        }
        // line 35
        echo "    ";
        if ((twig_get_attribute($this->env, $this->source, ($context["options"] ?? null), "languageSelector", [], "any", false, false, true, 35) == 1)) {
            // line 36
            echo "    <div class=\"fullcalendar-bottom-btn locale-selector\">
      <label for=\"locale-selector\">";
            // line 37
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Select Language:"));
            echo "</label>
      <select id='locale-selector-";
            // line 38
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["view_index"] ?? null), 38, $this->source), "html", null, true);
            echo "' calendar-view-index=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["view_index"] ?? null), 38, $this->source), "html", null, true);
            echo "\"></select>
    </div>
    ";
        }
        // line 41
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/fullcalendar_view/templates/views-view-fullcalendar.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 41,  89 => 38,  85 => 37,  82 => 36,  79 => 35,  73 => 32,  61 => 31,  58 => 30,  56 => 29,  47 => 27,  42 => 26,  40 => 23,  39 => 22,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * Default theme implementation for Views to output a Fullcalendar View.
 *
 * Available variables:
 * - options: View plugin style options:
 *   - classes: CSS classes.
 *   - defaultDate: Default date of the calendar
 *   - start: Field name of start date
 *   - end: Field name of end date
 *   - languageSelector: Flag for the language dropdown box
 * - view_index: View index
 * - showAddEvent: Show add event button
 * - entity_id: The Entity type machine name
 *
 * @see template_preprocess_views_view_fullcalendar()
 *
 * @ingroup themeable
 */
#}
{%
  set classes = [
    options.classes
  ]
%}
<div{{ attributes.addClass(classes) }}>
  <div class=\"js-drupal-fullcalendar\" calendar-view-index=\"{{ view_index }}\" calendar-view-name=\"{{ view_id }}\" calendar-display=\"{{ display_id }}\"></div>
  <div class=\"bottom-buttons fc-button-group\">
    {% if showAddEvent %}
    <div class=\"fullcalendar-bottom-btn add-event-btn\">
        <a id=\"calendar-add-event\"  href=\"fullcalendar-view-event-add?entity={{ entity_id }}&bundle={{ options.bundle_type }}&start_field={{ options.start }}&end_field={{ options.end }}&destination={{ path('<current>') }}\" class=\"use-ajax\" data-dialog-type=\"dialog\" data-dialog-renderer=\"off_canvas\" 
   data-dialog-options=\"{&quot;width&quot;:400}\">{{ 'Add event'|t }}</a>
    </div>
    {% endif %}
    {% if options.languageSelector == 1 %}
    <div class=\"fullcalendar-bottom-btn locale-selector\">
      <label for=\"locale-selector\">{{ 'Select Language:'|t }}</label>
      <select id='locale-selector-{{ view_index }}' calendar-view-index=\"{{ view_index }}\"></select>
    </div>
    {% endif %}
  </div>
</div>
", "modules/contrib/fullcalendar_view/templates/views-view-fullcalendar.html.twig", "C:\\Bitnami\\wampstack-7.4.27-0\\apache2\\htdocs\\onecamp\\web\\modules\\contrib\\fullcalendar_view\\templates\\views-view-fullcalendar.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 22, "if" => 29);
        static $filters = array("escape" => 26, "t" => 32);
        static $functions = array("path" => 31);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 't'],
                ['path']
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

<?php

/* media_library_bgm_url.html.twig */
class __TwigTemplate_923826fc82db35c5c688f4f32d4eb232 extends Twig_Template
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
        // line 7
        if (isset($context["errors"])) { $_errors_ = $context["errors"]; } else { $_errors_ = null; }
        if ($_errors_) {
            // line 8
            echo "<div id=\"message\" class=\"error\">";
            if (isset($context["errors"])) { $_errors_ = $context["errors"]; } else { $_errors_ = null; }
            echo twig_escape_filter($this->env, $_errors_, "html", null, true);
            echo "</div>
";
        }
        // line 10
        echo "
<form method=\"post\" action=\"\" class=\"media-upload-form type-form\">
    <input type=\"hidden\" name=\"post_id\" id=\"post_id\" value=\"";
        // line 12
        if (isset($context["post_id"])) { $_post_id_ = $context["post_id"]; } else { $_post_id_ = null; }
        echo twig_escape_filter($this->env, $_post_id_, "html", null, true);
        echo "\" />
    ";
        // line 13
        if (isset($context["nonce"])) { $_nonce_ = $context["nonce"]; } else { $_nonce_ = null; }
        echo $_nonce_;
        echo "

    ";
        // line 15
        if (isset($context["attachment"])) { $_attachment_ = $context["attachment"]; } else { $_attachment_ = null; }
        if (($_attachment_ != "")) {
            // line 16
            echo "    <input type=\"hidden\" name=\"attachment_id\" id=\"attachment_id\" value=\"";
            if (isset($context["attachment_id"])) { $_attachment_id_ = $context["attachment_id"]; } else { $_attachment_id_ = null; }
            echo twig_escape_filter($this->env, $_attachment_id_, "html", null, true);
            echo "\" />

    <div id=\"media-items\">
        <div class=\"media-item\">
            ";
            // line 20
            if (isset($context["attachment"])) { $_attachment_ = $context["attachment"]; } else { $_attachment_ = null; }
            echo $_attachment_;
            echo "
        </div>
    </div>

    ";
            // line 24
            if (isset($context["save_btn"])) { $_save_btn_ = $context["save_btn"]; } else { $_save_btn_ = null; }
            echo $_save_btn_;
            echo "
    ";
        } else {
            // line 26
            echo "
    <h3 class=\"media-title\">";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("Add an image from an external source"), "html", null, true);
            echo "</h3>
    <p>";
            // line 28
            echo twig_escape_filter($this->env, $this->env->getExtension('translate')->transFilter("After an image has been retrieved, you can add a title and description."), "html", null, true);
            echo "</p>

    <label for=\"url\">Image URL:</label>
    <input id=\"url\" name=\"url\" type=\"text\" value=\"http://\" style=\"width:300px;\" />
    
    ";
            // line 33
            if (isset($context["get_btn"])) { $_get_btn_ = $context["get_btn"]; } else { $_get_btn_ = null; }
            echo $_get_btn_;
            echo "
    ";
        }
        // line 35
        echo "</form>

";
    }

    public function getTemplateName()
    {
        return "media_library_bgm_url.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  85 => 33,  77 => 28,  73 => 27,  70 => 26,  64 => 24,  56 => 20,  47 => 16,  44 => 15,  38 => 13,  33 => 12,  29 => 10,  22 => 8,  19 => 7,);
    }
}

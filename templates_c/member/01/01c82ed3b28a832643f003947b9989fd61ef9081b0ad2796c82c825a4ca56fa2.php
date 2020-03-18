<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* regist.html.twig */
class __TwigTemplate_e55d33f98c8e50508f4f5aaa680337b30d9a8c6952f56ccca075a2f3e2c20465 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"utf-8\">
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
    <script src=\"";
        // line 6
        echo twig_escape_filter($this->env, twig_constant("member\\Bootstrap::APP_URL"), "html", null, true);
        echo "js/common.js\"></script>
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, twig_constant("member\\Bootstrap::APP_URL"), "html", null, true);
        echo "css/style.css\" rel=\"stylesheet\">
    <title>会員登録</title>
  </head>
  <body>
    <input type=\"hidden\" name=\"entry_url\"
            id=\"entry_url\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, twig_constant("member\\Bootstrap::ENTRY_URL"), "html", null, true);
        echo "\">
    <form method=\"post\" action=\"confirm.php\">
      <table>
        <tr>
          <th>お名前(氏名)<span class=\"red\">*</span></th>
          <td>
            <input type=\"text\" name=\"family_name\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "family_name", []), "html", null, true);
        echo "\">
            <input type=\"text\" name=\"first_name\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "first_name", []), "html", null, true);
        echo "\">
          ";
        // line 20
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "family_name", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "family_name", []), "html", null, true);
            echo "</span>";
        }
        // line 21
        echo "          ";
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "first_name", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "first_name", []), "html", null, true);
            echo "</span>";
        }
        // line 22
        echo "          </td>
        </tr>

        <tr>
          <th>お名前(かな)</th>
          <td>
           <input type=\"text\" name=\"family_name_kana\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "family_name_kana", []), "html", null, true);
        echo "\">
           <input type=\"text\" name=\"first_name_kana\" value=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "first_name_kana", []), "html", null, true);
        echo "\">
          </td>
       </tr>

       <tr>
         <th>性別<span class=\"red\">*</span></th>
         <td>
         ";
        // line 36
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["sexArr"] ?? null));
        foreach ($context['_seq'] as $context["index"] => $context["label"]) {
            // line 37
            echo "         <input type=\"radio\" name=\"sex\" value=\"";
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\" id=\"sex_";
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\" ";
            if (($this->getAttribute(($context["dataArr"] ?? null), "sex", []) == $context["index"])) {
                echo " checked=\"checked\" ";
            }
            echo ">
         <label for=\"sex_";
            // line 38
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo "</label>
         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "         ";
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "sex", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "sex", []), "html", null, true);
            echo "</span>";
        }
        // line 41
        echo "         </td>
       </tr>

       <tr>
         <th>生年月日<span class=\"red\">*</span></th>
         <td>
           <select name=\"year\" >
           ";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["yearArr"] ?? null));
        foreach ($context['_seq'] as $context["index"] => $context["label"]) {
            // line 49
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\" ";
            if (($this->getAttribute(($context["dataArr"] ?? null), "year", []) == $context["index"])) {
                echo " selected ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo "</option>
           ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "           </select>

           <select name='month'>
            ";
        // line 54
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["monthArr"] ?? null));
        foreach ($context['_seq'] as $context["index"] => $context["label"]) {
            // line 55
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\" ";
            if (($this->getAttribute(($context["dataArr"] ?? null), "month", []) == $context["index"])) {
                echo " selected ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "          </select>

          <select name='day'>
          ";
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["dayArr"] ?? null));
        foreach ($context['_seq'] as $context["index"] => $context["label"]) {
            // line 61
            echo "          <option value=\"";
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\" ";
            if (($this->getAttribute(($context["dataArr"] ?? null), "day", []) == $context["index"])) {
                echo " selected ";
            }
            echo ">";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo "</option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "          </select>
        ";
        // line 64
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "year", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "year", []), "html", null, true);
            echo "</span>";
        }
        // line 65
        echo "        ";
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "month", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "month", []), "html", null, true);
            echo "</span>";
        }
        // line 66
        echo "        ";
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "day", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "day", []), "html", null, true);
            echo "</span>";
        }
        // line 67
        echo "          </td>
       </tr>

       <tr>
         <th>郵便番号<span class=\"red\">*</span></th>
         <td>
           <input type=\"text\" name=\"tel1\" value=\"";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "tel1", []), "html", null, true);
        echo "\" size=\"6\" maxlength=\"6\"> -
           <input type=\"text\" name=\"tel2\" value=\"";
        // line 74
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "tel2", []), "html", null, true);
        echo "\" size=\"6\" maxlength=\"6\"> -
           <input type=\"text\" name=\"tel3\" value=\"";
        // line 75
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "tel3", []), "html", null, true);
        echo "\" size=\"6\" maxlength=\"6\">
           ";
        // line 76
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel1", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel1", []), "html", null, true);
            echo "</span>";
        }
        // line 77
        echo "           ";
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel2", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel2", []), "html", null, true);
            echo "</span>";
        }
        // line 78
        echo "           ";
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel3", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel3", []), "html", null, true);
            echo "</span>";
        }
        // line 79
        echo "         </td>
       </tr>

       <tr>
         <th>住所<span class=\"red\">*</span></th>
         <td>
           <input type=\"text\" name=\"address\"
                  value=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "address", []), "html", null, true);
        echo "\" id=\"address\" size=\"40\">
         ";
        // line 87
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "address", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "address", []), "html", null, true);
            echo "</span>";
        }
        // line 88
        echo "         </td>
       </tr>

       <tr>
         <th>メールアドレス<span class=\"red\">*</span></th>
         <td>
           <input type=\"text\" name=\"email\" value=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "email", []), "html", null, true);
        echo "\" size=\"40\">
           ";
        // line 95
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "email", [])) > 0)) {
            echo "<br><span class=\"red\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "email", []), "html", null, true);
            echo "</span>";
        }
        // line 96
        echo "         </td>
       </tr>

       <tr>
         <th>電話番号<span class=\"red\">*</span></th>
         <td>
           <input type=\"text\" name=\"tel1\" value=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "tel1", []), "html", null, true);
        echo "\" size=\"6\" maxlength=\"6\"> -
           <input type=\"text\" name=\"tel2\" value=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "tel2", []), "html", null, true);
        echo "\" size=\"6\" maxlength=\"6\"> -
           <input type=\"text\" name=\"tel3\" value=\"";
        // line 104
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "tel3", []), "html", null, true);
        echo "\" size=\"6\" maxlength=\"6\">

           ";
        // line 106
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel1", [])) > 0)) {
            echo " <br> <span class=\"red\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel1", []), "html", null, true);
            echo " </span> ";
        }
        // line 107
        echo "           ";
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel2", [])) > 0)) {
            echo " <br> <span class=\"red\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel2", []), "html", null, true);
            echo " </span> ";
        }
        // line 108
        echo "           ";
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel3", [])) > 0)) {
            echo " <br> <span class=\"red\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "tel3", []), "html", null, true);
            echo " </span> ";
        }
        // line 109
        echo "         </td>
       </tr>

       <tr>
         <th>交通手段<span class=\"red\">*</span></th>
         <td>
         ";
        // line 115
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["trafficArr"] ?? null));
        foreach ($context['_seq'] as $context["index"] => $context["label"]) {
            // line 116
            echo "         <input type=\"checkbox\" name=\"traffic[]\"
                value=\"";
            // line 117
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\" id=\"traffic_";
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\"
                ";
            // line 118
            if (twig_in_filter($context["index"], $this->getAttribute(($context["dataArr"] ?? null), "traffic", []))) {
                echo " checked=\"checked\" ";
            }
            echo ">
         <label for=\"traffic_";
            // line 119
            echo twig_escape_filter($this->env, $context["index"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["label"], "html", null, true);
            echo "</label>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['label'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 121
        echo "         ";
        if ((twig_length_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "traffic", [])) > 0)) {
            echo "<br>
         <span class=\"red\">";
            // line 122
            echo twig_escape_filter($this->env, $this->getAttribute(($context["errArr"] ?? null), "traffic", []), "html", null, true);
            echo "</span>";
        }
        // line 123
        echo "          </td>
        </tr>

        <tr>
          <th>備考</th>
          <td>
            <textarea name=\"contents\" rows=\"4\" cols=\"40\">";
        // line 129
        echo twig_escape_filter($this->env, $this->getAttribute(($context["dataArr"] ?? null), "contents", []), "html", null, true);
        echo "</textarea>
          </td>
        </tr>
      </table>

        <div>
          <input type=\"submit\" name=\"confirm\" value=\"登録確認\">
        </div>
      </form>

    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "regist.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  404 => 129,  396 => 123,  392 => 122,  387 => 121,  377 => 119,  371 => 118,  365 => 117,  362 => 116,  358 => 115,  350 => 109,  343 => 108,  336 => 107,  330 => 106,  325 => 104,  321 => 103,  317 => 102,  309 => 96,  303 => 95,  299 => 94,  291 => 88,  285 => 87,  281 => 86,  272 => 79,  265 => 78,  258 => 77,  252 => 76,  248 => 75,  244 => 74,  240 => 73,  232 => 67,  225 => 66,  218 => 65,  212 => 64,  209 => 63,  194 => 61,  190 => 60,  185 => 57,  170 => 55,  166 => 54,  161 => 51,  146 => 49,  142 => 48,  133 => 41,  126 => 40,  116 => 38,  105 => 37,  101 => 36,  91 => 29,  87 => 28,  79 => 22,  72 => 21,  66 => 20,  62 => 19,  58 => 18,  49 => 12,  41 => 7,  37 => 6,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "regist.html.twig", "/Applications/MAMP/htdocs/DT/templates/member/regist.html.twig");
    }
}

define("blog_quest","onRequest",function(){$(function(){var h=$("#blog_quest").on("change",".js-checkbox",function(e){var c=$(this),n=c.hasClass("form-checkbox_checked"),o=h.data("maxSelected"),t=h.find(".js-checkbox.form-checkbox_checked").length+(n?0:1);o<t?(Spaces.view.setInputError(c,L("Нельзя выбрать более {0}",numeral(o,[L("$n категории"),L("$n категорий"),L("$n категорий")]))),n||e.preventDefault()):h.find(".js-checkbox").each(function(){Spaces.view.setInputError($(this),!1)})});h.find(".js-checkbox.form-checkbox_checked").each(function(){var e=$(this);Spaces.view.hasInputError(e)&&e.click()})})});
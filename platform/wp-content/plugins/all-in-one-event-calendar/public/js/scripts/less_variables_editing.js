timely.define(["jquery_timely","domReady","ai1ec_config","libs/utils","external_libs/bootstrap_colorpicker","external_libs/bootstrap/tab","external_libs/jquery_cookie"],function(e,t,n,r){var i=function(t){var n=e(this).attr("href");e.cookie("less_variables_active_tab",n)},s=function(t){t===null?e("ul.ai1ec-nav a:first").tab("show"):e("ul.ai1ec-nav a[href="+t+"]").tab("show")},o=function(){e(this).val()==="custom"?e(this).closest(".ai1ec-form-group").find(".ai1ec-custom-font").removeClass("ai1ec-hide"):e(this).closest(".ai1ec-form-group").find(".ai1ec-custom-font").addClass("ai1ec-hide")},u=function(){return window.confirm(n.confirm_reset_theme)},a=function(){var t=!0;return e(".ai1ec-less-variable-size").each(function(){var r=e(this),i=r.closest(".ai1ec-form-group"),s=e.trim(r.val());i.removeClass("ai1ec-has-warning");if(""===s)return;var o=/^auto$|^[+-]?[0-9]+\.?([0-9]+)?(px|em|ex|%|in|cm|mm|pt|pc)?$/ig;if(!o.test(s)){t=!1;var u=i.closest(".ai1ec-tab-pane").attr("id");return i.closest(".ai1ec-tabbable").find('a[data-toggle="ai1ec-tab"][href="#'+u+'"]').trigger("click"),i.addClass("ai1ec-has-warning"),window.alert(n.size_less_variable_not_ok),r.trigger("focus"),!1}}),t};t(function(){e(".colorpickers").colorpicker(),r.activate_saved_tab_on_page_load(e.cookie("less_variables_active_tab")),e(document).on("click","ul.ai1ec-nav a",i).on("click","#ai1ec_reset_themes_options",u).on("change",".ai1ec_font",o),e("#ai1ec_save_themes_options").closest("form").on("submit",a)})});
!function(a){a.mmenu.wrappers.bootstrap3=function(){if(this.$menu.hasClass("navbar-collapse")){this.conf.classNames.selected="active",this.conf.classNames.divider="divider",this.conf.clone=!0,this.opts.hooks=this.opts.hooks||{};for(var n="",a=["nav-tabs","nav-pills","navbar-nav"],e=0;e<a.length;e++)if(this.$menu.find("."+a[e]).length){n=a[e];break}n.length&&(this.opts.hooks["initMenu:before"]=function(){"navbar-nav"==n&&this.$menu.wrapInner("<div />")},this.opts.hooks["initMenu:after"]=function(){t.menu.call(this),t.dropdown.call(this),t[n.split("nav-").join("").split("-nav").join("")].call(this)})}};var t={menu:function(){this.$menu.find(".nav").removeClass("nav").end().find(".sr-only").remove().end().find(".divider:empty").remove();for(var n=["role","aria-haspopup","aria-expanded"],a=0;a<n.length;a++)this.$menu.find("["+n[a]+"]").removeAttr(n[a])},dropdown:function(){var n=this.$menu.find(".dropdown");n.removeClass("dropdown"),n.children(".dropdown-toggle").find(".caret").remove().end().each(function(){a(this).replaceWith("<span>"+a(this).html()+"</span>")}),n.children(".dropdown-menu").removeClass("dropdown-menu")},tabs:function(){this.$menu.find(".nav-tabs").removeClass("nav-tabs")},pills:function(){this.$menu.find(".nav-pills").removeClass("nav-pills")},navbar:function(){var a=this;this.$menu.removeClass("collapse navbar-collapse").find('[class*="navbar-"]').removeClass("navbar-left navbar-right navbar-nav navbar-text navbar-btn");var n=this.$menu.find(".navbar-form");this.conf.searchform={form:{action:n.attr("action"),method:n.attr("method")},input:{name:n.find("input").attr("name")},submit:!0},n.remove(),(this.$orig||this.$menu).closest(".navbar").find(".navbar-header").find(".navbar-toggle").off("click").on("click",function(n){a.open(),n.stopImmediatePropagation(),n.preventDefault()})}}}(jQuery);
/********************************************************
 *
 * Custom Javascript code for AppStrap Bootstrap theme
 * Written by Themelize.me (http://themelize.me)
 *
 *******************************************************/
var jPM = {}, pageLoaderDone = false;
var PLUGINS_LOCALPATH = './assets/plugins/';
var SLIDER_REV_VERSION = '4.6';
jQuery(document).ready(function() {
  "use strict";

  // ****************************************************************
  // Custom / Bootstrap onLoad functionality
  //
  // ****************************************************************

  // ----------------------------------------------------------------
  // fakeLoader.js - page loading indicator/icon
  // @see: http://joaopereirawd.github.io/fakeLoader.js/
  // ----------------------------------------------------------------
  if (jQuery('[data-toggle=page-loader]').length > 0) {
    var initPageLoader = function() {
      jQuery('html').addClass('has-page-loader');
      var $pageLoader = jQuery('[data-toggle=page-loader]'),
        options = {
          zIndex:9999999,
          spinner: $pageLoader.data('spinner') || 'spinner7',
          timeToHide:1000
        }
      $pageLoader.fakeLoader(options);
      jQuery().isPageLoaderDone(function() {
        jQuery('html').removeClass('has-page-loader');
        $(window).trigger('resize');
      });
    };
    jQuery().themeLoadPlugin(["fakeLoader/fakeLoader.min.js"], ["fakeLoader/fakeLoader.css"], initPageLoader);
  } 

  // ----------------------------------------------------------------
  // Count To (counters)
  // @see: https://github.com/mattboldt/typed.js
  // ----------------------------------------------------------------
  var $countTos = jQuery('[data-toggle="count-to"]');
  if ($countTos.length > 0) {
    var initCountTo = function() {
      $countTos.each(function() {
        var $this = $(this),
        delay = $this.data('delay') || 0; 
        $this.waypoint(function() {
          setTimeout(function() {
            $this.countTo({
              onComplete: function() {
                $this.addClass('count-to-done');
              },
              formatter: function (value, options) {
                var v = value.toFixed(options.decimals);
                if (v == '-0') {
                  v = '0';
                }
                return v;
              },
            });
          }, delay);
          this.destroy();
        },{
          offset: '90%',
        });
      });
    };
    jQuery().themeLoadPlugin(["https://cdnjs.cloudflare.com/ajax/libs/jquery-countto/1.2.0/jquery.countTo.min.js"], [], function() {
      jQuery().includeWaypoints(function() {
        jQuery().isPageLoaderDone(initCountTo);
      });
    });
  }  
  
  // ----------------------------------------------------------------
  // typed.js - typewriter effect
  // @see: https://github.com/mattboldt/typed.js
  // ----------------------------------------------------------------
  var $typed = jQuery('[data-typed]');
  if ($typed.length > 0) {
    var initTyped = function() {
      $typed.each(function() {
        var $this = $(this),
        typedStrings = $this.data('typed') || null,
        typedSettings = $this.data('typed-settings') || {},
        typedDelay = typedSettings.delay || 0;
        typedSettings.autoStart = false;
        typedSettings.callback = function() {
          if (typedSettings.doneClass !== '') {
            $.each(typedSettings.doneClass, function(e, c) {
              $(e).addClass(c);
            })
          }
        };

        if (typedStrings !== '') {
          if (typeof typedStrings === 'string') {
            
          }
          else if (typeof typedStrings === 'object') {
            typedSettings.strings = typedStrings;
          }
          
          $this.waypoint(function() {
            setTimeout(function() {
              $this.typeIt(typedSettings);
            }, typedDelay);
            this.destroy();
          },{
            offset: '100%',
          });
        }
      });
    };
    jQuery().themeLoadPlugin(["https://cdnjs.cloudflare.com/ajax/libs/typeit/4.3.0/typeit.min.js"], [], function() {
      jQuery().includeWaypoints(function() {
        jQuery().isPageLoaderDone(initTyped);
      });
    });
  }   
  
  // ----------------------------------------------------------------
  // Fullheight elements
  // ----------------------------------------------------------------
  var fullHeights = jQuery('[data-toggle="full-height"]');
  if (fullHeights.length > 0) {   
    var doFullHeightsOffset = function(height, offset) {
      if (typeof offset == 'number') {
        return height - offset;
      }
      else if (typeof offset == 'string' && $(offset).length > 0) {
        $(offset).each(function() {
          height = height - $(offset).height();
        });
      }
      return height;
    };
    
    var doFullHeights = function() {
      fullHeights.each(function() {
        var $element = $(this),
          fullHeightParent = $element.data('parent') || window,
          fullHeightOffset = $element.data('offset') || null,
          fullHeightBreakpoint = $element.data('breakpoint') || null,
          $fullHeightParent = $(fullHeightParent) || null;
          
        if ($fullHeightParent) {  
          var fullHeightParentHeight = $fullHeightParent.height();          
          var fullHeight = fullHeightParentHeight;
          if (fullHeightOffset) {
            fullHeight = doFullHeightsOffset(fullHeight, fullHeightOffset);
          }
          
          if (fullHeightBreakpoint) {
            if ($(window).width() <= fullHeightBreakpoint) {
              $element.css('height', 'auto');
            }
            else {
              $element.outerHeight(fullHeight);
            }
          }
          else {
            $element.outerHeight(fullHeight);
          }
        }
      });
    };
    
    doFullHeights();  
    $(window).on('resize', function() {
      setTimeout(function() {
        doFullHeights();
      }, 400);
    });
  }
  
  // ----------------------------------------------------------------
  // Animated elements
  // ----------------------------------------------------------------
  var elementsAnimated = jQuery('[data-animate]');
  if (elementsAnimated.length > 0) {
    var initElementsAnimated = function() {
      elementsAnimated.each(function() {
        var $element = jQuery(this),
          animateClass = $element.data('animate'),
          animateInfinite = $element.data('animate-infinite') || null,
          animateDelay = $element.data('animate-delay') || null,
          animateDuration = $element.data('animate-duration') || null,
          animateOffset = $element.data('animate-offset') || '98%';
        
        // Infinite
        if (animateInfinite != null) {
          $element.addClass('infinite');
        }
        
        // Delays & durations
        if (animateDelay !== null) {
          $element.css({
            '-webkit-animation-delay': animateDelay +'s',
            '-moz-animation-delay': animateDelay +'s',
            'animation-delay': animateDelay +'s'
          });
        }
        if (animateDuration !== null) {
          $element.css({
            '-webkit-animation-duration': animateDuration +'s',
            '-moz-animation-duration': animateDuration +'s',
            'animation-duration': animateDuration +'s'
          });
        }
          
        $element.waypoint(function() {
          $element.addClass('animated '+ animateClass).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
            $element.addClass('animated-done');
          });
          this.destroy();
        },{
          offset: animateOffset,
        });
      });
    }
    
    jQuery().includeWaypoints(function() {
      jQuery().themeLoadPlugin([], ["https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"], function() {
        jQuery().isPageLoaderDone(initElementsAnimated);
      });
    });
  }

  // ----------------------------------------------------------------
  // Scroll state
  // ----------------------------------------------------------------
  $('[data-scroll="scroll-state"]').each(function() {
    var $scroll = $(this),
      $doc = $(document),
      scrollAmount = $scroll.data('scroll-amount') || $(window).outerHeight();
    
    $doc.scroll(function() {
      var y = $(this).scrollTop();
      if (y > scrollAmount) {
        $scroll.addClass('scroll-state-active');
      } else {
        $scroll.removeClass('scroll-state-active');
      }
    });
  });

  // ----------------------------------------------------------------
  // scrollax - adjust oapcity & top on scroll
  // ----------------------------------------------------------------
  $('[data-scroll="scrollax"]').each(function() {
    var $scroll = $(this),
      $doc = $(document),
      $window = $(window),
      opRatio = $scroll.data('scrollax-op-ratio') || 500,
      yRatio = $scroll.data('scrollax-y-ratio') || 5;
    
    $doc.scroll(function() {
      var windowTop = $window.scrollTop();
      $scroll.css({
        "opacity": 1 - windowTop / opRatio,
        "transform": "translateY("+ (0 - windowTop / yRatio) +"px)",
      });
    });
  });
  
  // ----------------------------------------------------------------
  // Quantity widget
  // ----------------------------------------------------------------
  $('[data-toggle="quantity"]').each(function() {
    var $this = $(this),
      $down = $this.find('.quantity-down'),
      $up = $this.find('.quantity-up'),
      $quantity = $this.find('.quantity');
    
    var toggleQuantity = function(direction) {
      var value = parseInt($quantity.val());
      if (direction === 'down') {
        value = value - 1;
      }
      else if (direction === 'up') {
        value = value + 1;
      }
      if (value < 0) {
        value = 0;
      }
      $quantity.val(value);
    };
      
    if ($quantity.length > 0) {
      $down.on('click', function() {
        toggleQuantity('down');
      });
      $up.on('click', function() {
        toggleQuantity('up');
      });
    }
  });
  
  // ----------------------------------------------------------------
  // Background images
  // @todo - support retina bg too
  // ----------------------------------------------------------------
  $('[data-bg-img]').each(function() {
    var $this = $(this),
      currentStyles = $this.attr("style") || '',
      bgImg = $this.data('bg-img');
      
      // Must be merged in
      currentStyles += 'background-image: url("'+ bgImg + '") !important;';
      $this.attr("style", currentStyles).addClass('bg-img');
  });
  
  // ----------------------------------------------------------------
  // Dynamic/quick CSS props
  // Example: data-css='{"height":"240px","background-position":"center center"}'
  // ----------------------------------------------------------------
  $('[data-css]').each(function() {
    var $this = $(this),
      currentStyles = $this.data('css') || '',
      styleProps = $this.data('css') || {},
      newStyles = {};
    if (styleProps !== null && typeof styleProps === 'object') {
      newStyles = $.extend(currentStyles, styleProps);
      $this.css(newStyles);
    }
  });  
  
  // ----------------------------------------------------------------
  // Overlay menu
  // ----------------------------------------------------------------
  var overlayMenus = jQuery('[data-toggle=overlay]');
  if (overlayMenus.length > 0) {
    overlayMenus.each(function() {
      var $this = jQuery(this),
        target = $this.data('target') || null;

      // General class for all triggers
      $this.addClass('overlay-trigger');
      if (jQuery(target).size() > 0) {
        $target = jQuery(target);
        $this.on('click', function(e) {
          $this.toggleClass('overlay-active');
          jQuery($this.data('target')).toggleClass('overlay-active');
          jQuery('body').toggleClass('overlay-open');
          return false;
        });
      }
    });
    
    // Overlay dismiss links/buttons
    jQuery('[data-dismiss="overlay"]').each(function() {
      var $this = jQuery(this),
        $target = $this.data('target') || '.overlay',
        $trigger = jQuery('[data-toggle="overlay"][data-target="'+ $target +'"]') || null;
        
      // Check target overlay to close exists
      if ($($target).size() > 0) {
        $target = jQuery($target);
        $this.on('click', function(e) {
          $target.removeClass('overlay-active');
          jQuery('body').removeClass('overlay-open');
          
          // Try to find the trigger
          if ($trigger.size() > 0) {
            $trigger.removeClass('overlay-active');
          }
          else {
            // close all
            jQuery('[data-toggle="overlay"]').removeClass('overlay-active');
          }
          return false;
        });
      }
    });
  }
  
  // ----------------------------------------------------------------
  // Clickable elements
  // ----------------------------------------------------------------
  $('[data-url]').each(function() {
    var url = $(this).data('url');
    var parseStringUrl = function(url) {
        var a = document.createElement('a');
        a.href = url;
        return a;
    };
    var urlParse = parseStringUrl(url);
    $(this).addClass('clickable-element');

    // Hover event
    $(this).on('hover', function() {
      $(this).hover(
        function() {
          $( this ).addClass( "hovered" );
        }, function() {
          $(this).removeClass( "hovered" );
        }
      );
    });

    // Disable Links within block
    $(this).find('a').on('click', function(e) {
      if ($(this).attr('href') === urlParse.href) {
        e.preventDefault();
      }
    });

    // Click event
    $(this).on('click', function() {
      if (urlParse.host !== location.host) {
        // external
        window.open(urlParse.href, '_blank');
      }
      else {
        // internal
        window.location = url;
      }
    });
  });
  
  // ----------------------------------------------------------------
  // Search form show/hide
  // ----------------------------------------------------------------
  if ($('[data-toggle=search-form]').length > 0) {
    var $trigger = $('[data-toggle=search-form]');
    var target = $trigger.data('target');
    var $target = $(target);
    
    if ($target.length === 0) {
      return;
    }
    
    $target.addClass('collapse');
    $('[data-toggle=search-form]').click(function() {
      $target.collapse('toggle');
      $(target +' .search').focus();
      $trigger.toggleClass('open');
      $('html').toggleClass('search-form-open');
      $(window).trigger('resize');
    });
    $('[data-toggle=search-form-close]').click(function() {
      $target.collapse('hide');
      $trigger.removeClass('open');
      $('html').removeClass('search-form-open');
      $(window).trigger('resize');
    });
  }
  
  // ----------------------------------------------------------------
  // colour switch - demo only
  // ----------------------------------------------------------------
  var defaultColour = 'green';
  jQuery('.theme-colours a').click(function() {
    var $this = $(this);
    var c = $this.attr('href').replace('#','');
    var cacheBuster = 3 * Math.floor(Math.random() * 6);
    $('.theme-colours a').removeClass('active');
    $('.theme-colours a.'+ c).addClass('active');
    
    if (c !== defaultColour) {
      jQuery('#colour-scheme').attr('href','assets/css/colour-'+ c +'.css?x='+ cacheBuster);
    }
    else {
      jQuery('#colour-scheme').attr('href', '#');
    }
  });
  
  // ----------------------------------------------------------------
  // IE placeholders
  // ----------------------------------------------------------------
  if (navigator.userAgent.toLowerCase().indexOf('msie') > -1) {
    jQuery('[placeholder]').focus(function() {
      var input = jQuery(this);
      if (input.val() === input.attr('placeholder')) {
        if (this.originalType) {
          this.type = this.originalType;
          delete this.originalType;
        }
        input.val('');
        input.removeClass('placeholder');
      }
    }).blur(function() {
      var input = jQuery(this);
      if (input.val() === '') {
        input.addClass('placeholder');
        input.val(input.attr('placeholder'));
      }
    }).blur();
  }

  // ----------------------------------------------------------------
  // Plugin: Bootstrap Hover Dropdown
  // @see: https://github.com/CWSpear/bootstrap-hover-dropdown
  // ----------------------------------------------------------------
  if (jQuery('[data-hover="dropdown"]').length > 0) {
    jQuery().themeLoadPlugin(["bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"], [], null, 'append');
  }

  // ----------------------------------------------------------------
  // Bootstrap animated progressbar width
  // ----------------------------------------------------------------
  var progressBarsAnimated = jQuery('[data-toggle="progress-bar-animated-progress"]');
  if (progressBarsAnimated.length > 0) {
    var initProgressBarsAnimated = function() {
      progressBarsAnimated.each(function() {
        var $progress = jQuery(this);        
        $progress.waypoint(function() {
          $progress.css("width",
            function() {
              return $(this).attr("aria-valuenow") + "%";
            }
          ).addClass('progress-bar-animated-progress');
          this.destroy();
        },{
          offset: '98%'
        });
      });
    }
    
    jQuery().includeWaypoints(function() {
      progressBarsAnimated.css("width", 0);
      jQuery().isPageLoaderDone(initProgressBarsAnimated);
    });
  }
  
  // ----------------------------------------------------------------
  // Bootstrap collapse
  // ----------------------------------------------------------------
  var collapses = jQuery('[data-toggle="collapse"]');
  collapses.each(function() {
    var $this = $(this);
    var target = $this.attr('href') || $this.data('target');
    var parent = $this.data('parent') || null;
    if ($(target).length > 0) {
      if ($(target).hasClass('show')) {
        $this.addClass('show');
      }
    }
    
    $this.on({
      'click': function () {              
        $this.toggleClass('show', !$(target).hasClass('show'));
        $(window).trigger('resize');
        
        var $checks = $this.find('input[type="checkbox"]');
        if ($checks.length > 0) {
          $checks.prop('checked', !$(target).hasClass('show'));
        }
      }
    });
  });
  
  var radioCollapses = jQuery('[data-toggle="radio-collapse"]');
  radioCollapses.each(function(index, item) {
    var $item = $(item);
    var $target = $($item.data('target'));
    var $parent = $($item.data('parent'));
    var $radio = $item.find('input[type=radio]');
    var $radioOthers = $parent.find('input[type=radio]').not($radio);
  
    $radio.on('change', function() {
      if($radio.is(':checked')) {
        $target.collapse('show');
      } else {
        $target.collapse('hide');
      }
    });
    
    $radio.on('click', function() {  
      $radioOthers.prop('checked', false).trigger('change');
    });
  });  
  
  // ----------------------------------------------------------------
  // Bootstrap modals onload & duration
  // @see: http://v4-alpha.getbootstrap.com/components/modal/
  // ----------------------------------------------------------------
  var modalsDuration = jQuery('[data-modal-duration]');
  if (modalsDuration.length > 0) {
    var $modal = modalsDuration,
      duration = $modal.data('modal-duration'),
      progressBar = $('<div class="modal-progress"></div>');

    $modal.find('.modal-content').append(progressBar);
    
    // Actual durations
    $modal.on('show.bs.modal', function (e) {
      var i = 2;
      var durationProgress = setInterval(function() {
        progressBar.width(i++ +'%');
      }, duration/100);
    
      setTimeout(function() {
        $modal.modal('hide');
        clearInterval(durationProgress);
      }, duration);
    });
  }  
  
  var modalsOnload = jQuery('[data-toggle="modal-onload"]');
  if (modalsOnload.length > 0) {
    modalsOnload.each(function() {
      var $modal = $(this),
      delay = $modal.data('modal-delay') || null;
      
      // Delay modal opening
      if (delay !== null) {
        setTimeout(function() {
          $modal.modal();
        }, delay);
      }
      else {
        // No delay trigger direct
        $modal.modal();
      }
    });
  }    
  
  // ----------------------------------------------------------------
  // Bootstrap tooltip
  // @see: http://getbootstrap.com/javascript/#tooltips
  // ----------------------------------------------------------------
  // invoke by adding data-toggle="tooltip" to a tags (this makes it validate)
  if(jQuery().tooltip) {
    $('[data-toggle="tooltip"]').tooltip()
  }
  
  // ----------------------------------------------------------------  
  // Bootstrap popover
  // @see: http://getbootstrap.com/javascript/#popovers
  // ----------------------------------------------------------------
  // invoke by adding data-toggle="popover" to a tags (this makes it validate)
  if(jQuery().popover) {
    $('[data-toggle="popover"]').popover();
  }
  
  // ----------------------------------------------------------------
  // Theme core
  // ---------------------------------------------------------------- 
  jQuery('html').themeSubMenus();
  jQuery('html').themeScrollMenus();
  
  // ----------------------------------------------------------------
  // allow any page element to set page class
  // ----------------------------------------------------------------
  jQuery('[data-page-class]').each(function() {
    jQuery('html').addClass(jQuery(this).data('page-class'));
  });
  
  // ----------------------------------------------------------------
  // Detect Bootstrap fixed header
  // @see: http://getbootstrap.com/components/#navbar-fixed-top
  // ----------------------------------------------------------------
  if (jQuery('.navbar-fixed-top').size() > 0) {
    jQuery('html').addClass('has-navbar-fixed-top');
  }

  // ----------------------------------------------------------------
  // simple show toggles
  // ----------------------------------------------------------------  
  $('[data-toggle="show"]').each(function() {
    var $this = $(this);
    var target = $this.data('target');
    var $target = $(target);
    if ($target.length === 0) {
      return;
    }
    
    $this.click(function() {
      $target.toggleClass('show');
      return false;
    });
  });
  
  // ----------------------------------------------------------------
  // show hide for hidden header
  // ----------------------------------------------------------------
  jQuery('[data-toggle=show-hide]').each(function() {
    var $this = jQuery(this);
    var target = $this.attr('data-target');
    var $target = $(target);
    var state = 'show'; //open or hide
    var targetState = $this.attr('data-target-state');
    var callback = $this.attr('data-callback');

    if ($target.length === 0) {
      return;
    }
    
    if (state === 'show') {
      // Close by default
      $target.addClass('collapse');
    }
    
    $this.click(function() {
      //allows trigger link to say target is open & should be closed
      if (typeof targetState !== 'undefined' && targetState !== false) {
        state = targetState;
      }
      if (state === undefined) {
        state = 'show';
      }
      if (!$target.hasClass('show')) {
        // About to open
        $this.addClass('show');
      }
      else {
        $this.removeClass('show');
      }
      
      $target.collapse('toggle');
      
      if (callback && typeof(callback) === "function") {
        callback();
      }
    });
  });
  
  // ****************************************************************
  // Third-party plugin intergration
  // 
  // ****************************************************************

  // ----------------------------------------------------------------
  // Plugin: Video Backgrounds
  // @see: https://github.com/VodkaBears/Vide
  // ----------------------------------------------------------------
  var videoBgs = jQuery('[data-bg-video]');
  if (videoBgs.length > 0) {
    var initVide = function() {
      videoBgs.each(function() {
        var videoBg = $(this);
        var videoBgVideos = videoBg.data('bg-video') || null;
        var videoBgOptions = videoBg.data('settings') || {};
        var videoBgDefaultOptions = {'className': 'bg-video-video'};
        videoBgOptions = jQuery.extend(videoBgDefaultOptions, videoBgOptions);

        if (videoBgVideos !== null) {
          videoBg.addClass('bg-video').vide(videoBgVideos, videoBgOptions);
        }
      });
    }
    jQuery().themeLoadPlugin(['https://cdnjs.cloudflare.com/ajax/libs/vide/0.5.1/jquery.vide.min.js'], [], initVide);
  }
  
  // ----------------------------------------------------------------
  // Plugin: Bootstrap switch integration
  // @see: http://www.bootstrap-switch.org/
  // ----------------------------------------------------------------
  if (jQuery('[data-toggle=switch]').length > 0) {
    var initBootstrapSwitch = function() {
      jQuery('[data-toggle=switch]').bootstrapSwitch();
    };
    jQuery().themeLoadPlugin(["bootstrap-switch/build/js/bootstrap-switch.min.js"], ["bootstrap-switch/build/css/bootstrap3/bootstrap-switch.min.css"], initBootstrapSwitch);
  }
  
  // ----------------------------------------------------------------
  // Plugin: jPanel Menu
  // data-toggle=jpanel-menu must be present on .navbar-btn
  // @todo - allow options to be passed via data- attr
  // @see: http://jpanelmenu.com/
  // ----------------------------------------------------------------
  if(jQuery('[data-toggle=jpanel-menu]').length > 0) {
    var initjPMenu = function() {
      var jpanelMenuTrigger = jQuery('[data-toggle=jpanel-menu]');
      var jpanelMenuState = '';
      var triggerActive = function($trigger) {
        if ($trigger.css("display") === "block" || $trigger.css("display") === "inline-block") {
          return true;
        }
        return false;
      };
      
      jPM = jQuery.jPanelMenu({
        menu: jpanelMenuTrigger.data('target'),
        direction: jpanelMenuTrigger.data('direction'),
        trigger: '.'+ jpanelMenuTrigger.attr('class'),
        excludedPanelContent: '.jpanel-menu-exclude',
        openPosition: '280px',
        afterOpen: function() {
          jpanelMenuTrigger.addClass('open');
          jQuery('html').addClass('jpanel-menu-open');
        },
        afterClose: function() {
          jpanelMenuTrigger.removeClass('open');
          jQuery('html').removeClass('jpanel-menu-open');
        }
      });
      
      // Resize event trigger JPMenu on off based on trigger visibility
      var $window = $(window);
      $window.on("debouncedresize", function() {
        var triggerState = triggerActive(jpanelMenuTrigger);
        if (triggerState === true && jpanelMenuState !== 'on') {
          jPM.on();
          jQuery('html').themeSubMenus();
          jQuery('html').themeScrollMenus();
          jpanelMenuState = 'on';
          
          // Internal click not working
          jpanelMenuTrigger.on('click.jpm', function() {
            jPM.trigger(true);
            return false;
          });
        }
        else if (triggerState === false && jpanelMenuState !== 'off') {
          jPM.off();
          jpanelMenuTrigger.off('click.jpm');
          jQuery('html').themeSubMenus();
          jpanelMenuState = 'off';
        }
      });
      
      $window.trigger('resize');
    };
    jQuery().themeLoadPlugin(["jPanelMenu/jquery.jpanelmenu.min.js", "https://cdn.jsdelivr.net/jquery.smartresize/0.1/jquery.debouncedresize.js"], [], initjPMenu);
  }
  
  // ----------------------------------------------------------------
  // Plugin: fixto(sticky navbar)
  // @see: https://bbarakaci.github.io/fixto/
  // ----------------------------------------------------------------
  var stickys = jQuery('[data-toggle=clingify], [data-toggle=sticky]');
  if (stickys.length > 0) {
    var initSticky = function() {
      var stickySetSettings = function(sticky) {
        var stickySettings = sticky.data('settings') || {};
        stickySettings.className = 'is-sticky';
        stickySettings.useNativeSticky = false;
        sticky.data('stickSettings', stickySettings);
      }
      
      var stickyStart = function(sticky, state) {
        stickySetSettings(sticky);
        var stickySettings = sticky.data('stickSettings');  
        var stickyParent = stickySettings.parent || 'body';
        var stickyPersist = stickySettings.persist || false;
        var stickyBreakpoint = stickySettings.breakpoint || false;
        state = state || 'init';

        sticky.addClass('sticky').fixTo(stickyParent, stickySettings);
        
        // Sticky from the start - @todo
        if (stickyPersist) {
          stickySetPersist(sticky, stickySettings);
        }
  
        $(window).on('resize', function() {
          setTimeout(function() {
            if (stickyBreakpoint) {
              if ($(window).width() <= stickyBreakpoint) {
                sticky.fixTo('destroy');
                sticky.data('fixto-instance', '');
              }
              else {
                if (sticky.data('fixto-instance') === '') {
                  sticky.addClass('sticky').fixTo(stickyParent, sticky.data('stickSettings'));
                }
              }
            }
            
            if (stickyPersist) {
              stickySetPersist(sticky, stickySettings);
            }
          }, 400);
        });
      };

      var stickySetPersist = function(sticky, stickySettings) {
        var persistTop = sticky[0].getBoundingClientRect().top;
        if (stickySettings.mind !== '') {
          $(stickySettings.mind).each(function( key, value ) {
            var $this = $(value);
            if ($this.length > 0) {
              persistTop -= $this.outerHeight();
            }
          });
        }
        if (sticky.data('fixto-instance') !== '') {
          sticky.fixTo('setOptions', {
            top: persistTop
          });
        }
        else {
          sticky.attr('style', 'top: auto;');
        }
      };
      
      stickys.each(function(i) {
        stickyStart($(this));
      });
    };
    jQuery().themeLoadPlugin(["https://cdnjs.cloudflare.com/ajax/libs/fixto/0.5.0/fixto.js"], [], initSticky);
  }
  
  // ----------------------------------------------------------------
  // Plugin: flexslider
  // @see: http://www.woothemes.com/flexslider/
  // ----------------------------------------------------------------
  if (jQuery('.flexslider').length > 0) {
    var initFlexslider = function() {
      jQuery('.flexslider').each(function() {
        var sliderSettings =  {
          animation: jQuery(this).attr('data-transition'),
          selector: ".slides > .slide",
          controlNav: true,
          smoothHeight: true,
          start: function(slider) {
            //hide all animated elements
            slider.find('[data-animate-in]').each(function() {
              jQuery(this).css('visibility','hidden');
            });
    
            //slide backgrounds
            slider.find('.slide-bg').each(function() {
              jQuery(this).css({'background-image': 'url('+ jQuery(this).data('bg-img') +')'});
              jQuery(this).css('visibility','visible').addClass('animated').addClass(jQuery(this).data('animate-in'));
            });
            
            //animate in first slide
            slider.find('.slide').eq(1).find('[data-animate-in]').each(function() {
              jQuery(this).css('visibility','hidden');
              if (jQuery(this).data('animate-delay')) {
                jQuery(this).addClass(jQuery(this).data('animate-delay'));
              }
              if (jQuery(this).data('animate-duration')) {
                jQuery(this).addClass(jQuery(this).data('animate-duration'));
              }
              jQuery(this).css('visibility','visible').addClass('animated').addClass(jQuery(this).data('animate-in'));
              jQuery(this).one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
                function() {
                  jQuery(this).removeClass(jQuery(this).data('animate-in'));
                }
              );
            });
          },
          before: function(slider) {
            slider.find('.slide-bg').each(function() {
              jQuery(this).removeClass(jQuery(this).data('animate-in')).removeClass('animated').css('visibility','hidden');
            });
            
            //hide next animate element so it can animate in
            slider.find('.slide').eq(slider.animatingTo + 1).find('[data-animate-in]').each(function() {
              jQuery(this).css('visibility','hidden');
            });
          },
          after: function(slider) {
            //hide animtaed elements so they can animate in again
            slider.find('.slide').find('[data-animate-in]').each(function() {
              jQuery(this).css('visibility','hidden');
            });
            
            //animate in next slide
            slider.find('.slide').eq(slider.animatingTo + 1).find('[data-animate-in]').each(function() {
              if (jQuery(this).data('animate-delay')) {
                jQuery(this).addClass(jQuery(this).data('animate-delay'));
              }
              if (jQuery(this).data('animate-duration')) {
                jQuery(this).addClass(jQuery(this).data('animate-duration'));
              }
              jQuery(this).css('visibility','visible').addClass('animated').addClass(jQuery(this).data('animate-in'));
              jQuery(this).one('webkitAnimationEnd oanimationend msAnimationEnd animationend',
                function() {
                  jQuery(this).removeClass(jQuery(this).data('animate-in'));
                }
              );
            });
            
            $(window).trigger('resize');
            
          }
        };
        
        var sliderNav = jQuery(this).attr('data-slidernav');
        if (sliderNav !== 'auto') {
          sliderSettings = $.extend({}, sliderSettings, {
            manualControls: sliderNav +' li a',
            controlsContainer: '.flexslider-wrapper'
          });
        }
        
        jQuery('html').addClass('has-flexslider');
        jQuery(this).flexslider(sliderSettings);
        jQuery('.flexslider').resize(); //make sure height is right load assets loaded
      });
    };
    jQuery().themeLoadPlugin(["flexslider/jquery.flexslider-min.js"], ["flexslider/flexslider.css"], initFlexslider);
  }
  
  // ----------------------------------------------------------------
  // Plugin: Slider Revolution
  // @see: http://codecanyon.net/item/slider-revolution-responsive-jquery-plugin/2580848
  // ----------------------------------------------------------------
  if (jQuery('[data-toggle=slider-rev]').length > 0) {
    var initSliderRev = function() {
      jQuery('[data-toggle=slider-rev]').each(function() {
        var sliderRevEl = $(this);
        var sliderRevSettingsDefaults = {
          extensions: PLUGINS_LOCALPATH + 'slider-revolution/revolution/js/extensions/',
	  responsiveLevels:[1240,1024,778,480],
	  visibilityLevels:[1240,1024,778,480],
          navigation: {
            arrows: {
              enable: true,
              style: 'appstrap',
              tmp: '',
              rtl: false,
              hide_onleave: false,
              hide_onmobile: true,
              hide_under: 481,
              hide_over: 9999,
              hide_delay: 200,
              hide_delay_mobile: 1200,            
              left: {
                container: 'slider',
                h_align: 'left',
                v_align: 'center',
                h_offset: 20,
                v_offset: 0
              },
              right: {
                container: 'slider',
                h_align: 'right',
                v_align: 'center',
                h_offset: 20,
                v_offset: 0
              },
            },
          },
        };
        var sliderRevSettings;
        sliderRevEl.hide();
        sliderRevSettings = $.extend(sliderRevSettingsDefaults, sliderRevEl.data());
        var slider = sliderRevEl.css('visibility', 'visible').show().revolution(sliderRevSettings);  
      });
    };
    
    jQuery().themeLoadPlugin(
      [
        "slider-revolution/revolution/js/jquery.themepunch.tools.min.js?v=" + SLIDER_REV_VERSION,
        "slider-revolution/revolution/js/jquery.themepunch.revolution.min.js?v=" + SLIDER_REV_VERSION
      ],
      [
        "slider-revolution/revolution/css/settings.css?v=" + SLIDER_REV_VERSION
      ],
      initSliderRev
    );
  }
  
  // ----------------------------------------------------------------
  // Plugin: Backstretch
  // @see: http://srobbin.com/jquery-plugins/backstretch/
  // ----------------------------------------------------------------
  if (jQuery('[data-toggle=backstretch]').length > 0) {
    var initBackstretch = function() {
      jQuery('[data-toggle=backstretch]').each(function() {
        var backstretchEl = $(this);
        var backstretchTarget = jQuery, backstretchImgs = [];
        var backstretchSettings = {
          fade: 750,
          duration: 4000
        };
    
        // Get images from element
        jQuery.each(backstretchEl.data('backstretch-imgs').split(','), function(k, img) {
          backstretchImgs[k] = img;
        });
        
        // block level element
        if (backstretchEl.data('backstretch-target')) {
          backstretchTarget = backstretchEl.data('backstretch-target');
          if (backstretchTarget === 'self') {
            backstretchTarget = backstretchEl;
          }
          else {
            if ($(backstretchTarget).length > 0) {
              backstretchTarget = $(backstretchTarget);
            }
          }
        }
      
        if (backstretchImgs) {
          $('html').addClass('has-backstretch');
          
          // Merge in any custom settings
          backstretchSettings = $.extend({}, backstretchSettings, backstretchEl.data());
          backstretchTarget.backstretch(backstretchImgs, backstretchSettings);
          
          // add overlay
          if (backstretchEl.data('backstretch-overlay') !== false) {
            $('.backstretch').prepend('<div class="backstretch-overlay"></div>');
            
            if (backstretchEl.data('backstretch-overlay-opacity')) {
              $('.backstretch').find('.backstretch-overlay').css('background', 'white').fadeTo(0, backstretchEl.data('backstretch-overlay-opacity'));
            }
          }
        }
      });
    };
    jQuery().themeLoadPlugin(["backstretch/jquery.backstretch.min.js"], [], initBackstretch);
  }
  
  // ----------------------------------------------------------------
  // Plugin: FitVids.js
  // @see: http://fitvidsjs.com/
  // ----------------------------------------------------------------
  var selectors = [
    "iframe[src*='player.vimeo.com']",
    "iframe[src*='youtube.com']",
    "iframe[src*='youtube-nocookie.com']",
    "iframe[src*='kickstarter.com'][src*='video.html']",
    "object",
    "embed"
  ];
  if ($(this).find(selectors.join(',')).length > 0) {
    var initFitVids = function() {
      $('body').fitVids({ ignore: '.no-fitvids'});
    };
    jQuery().themeLoadPlugin(["fitvidsjs/jquery.fitvids.js"], [], initFitVids);
  }
  
  // ----------------------------------------------------------------
  // Plugin: Isotope (blog/customers grid & sorting)
  // @see: http://isotope.metafizzy.co/
  // Also loads plugin: Imagesloaded (utility for Isotope plugin)
  // @see: https://github.com/desandro/imagesloaded
  // ----------------------------------------------------------------
  if (jQuery('[data-toggle=isotope-grid]').length > 0) {
    var initIsotope = function() {
      jQuery('[data-toggle=isotope-grid]').each(function() {
        var $container = $(this),
            options = $container.data('isotope-options'),
            filters = $container.data('isotope-filter') || null;
            
        // Invoke isotope    
        $container.isotope(options);
        
        // If imagesLoaded avaliable use it
        if (jQuery().imagesLoaded) {
          $container.imagesLoaded( function() {
            $container.isotope('layout');
          });
        }
        
        // Filtering
        if (filters) {
          var $filters = $(filters);
          $filters.on('click', function(e) {
            e.preventDefault();
            var $this = $(this),
              filterValue = $this.data('isotope-fid') || null;
              
            if (filterValue) {
              $container.isotope({ filter: filterValue });
            }
            
            return false;
          });
        }
        
        $('body').addClass('has-isotope');
      });
    };
    jQuery().themeLoadPlugin(["https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.1/imagesloaded.pkgd.min.js", "https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"], [], initIsotope);
  }

  // ----------------------------------------------------------------
  // Plugin: highlightjs (code highlighting)
  // @see: https://highlightjs.org
  // ----------------------------------------------------------------
  if (jQuery('code').length > 0) {
    var initHighlightjs = function() {
      $('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
      });
    };
    jQuery().themeLoadPlugin(["https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/highlight.min.js"], ["https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/default.min.css", "https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.9.0/styles/github.min.css"], initHighlightjs);
  }

  // ----------------------------------------------------------------
  // Plugin: OwlCarousel (carousel displays)
  // @see: http://owlgraphic.com/owlcarousel/
  // ----------------------------------------------------------------
  if (jQuery('[data-toggle="owl-carousel"]').length > 0) {
    var initOwlCarousel = function() {
      jQuery('[data-toggle="owl-carousel"]').each(function() {
        var $owlCarousel = $(this),
          owlCarouselSettings;
        
        $owlCarousel.addClass('owl-carousel');
        if ($owlCarousel.data('owl-carousel-settings') !== '') {
          owlCarouselSettings = $owlCarousel.data('owl-carousel-settings');
        }
        
        $owlCarousel.owlCarousel(owlCarouselSettings);
      });
      
      $('[data-owl-carousel-thumbs]').each(function() {
        var $owlThumbsWrap = $(this),
          $owlThumbs = $owlThumbsWrap.find('.owl-thumb'),
          $owlTarget = $($owlThumbsWrap.data('owl-carousel-thumbs')) || null,
          owlThumbsCarousel = $owlThumbsWrap.data('toggle') !== '' && $owlThumbsWrap.data('toggle') == 'owl-carousel' || false;

        if ($owlTarget) {
          $owlThumbs.eq(0).addClass('active');
          $owlThumbs.on('click', function(event) {
            $owlTarget.trigger('to.owl.carousel', [$(this).parent().index(), 300, true]);
          });
          
          if (owlThumbsCarousel) {
            $owlThumbsWrap.owlCarousel();
          }
          
          // Owl API
          $owlTarget.owlCarousel();
          $owlTarget.on('changed.owl.carousel', function(event) {
            var item = event.item.index;
            $owlThumbs.removeClass('active');
            $owlThumbs.eq(item).addClass('active');
            
            if (owlThumbsCarousel) {
              if ($owlThumbsWrap.find('.owl-item').eq(item).hasClass('active') === false) {
                $owlThumbsWrap.trigger('to.owl.carousel', [item, 300, true]);
              }
            }
          });
        }
      });
    };
    jQuery().themeLoadPlugin(
      [
        "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/owl.carousel.min.js",
      ],
      [
        "https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.0/assets/owl.carousel.min.css",
        "https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
      ], initOwlCarousel
    );
  }

  // ----------------------------------------------------------------
  // Plugin: MagnificPopup (popup content)
  // @see: http://dimsemenov.com/plugins/magnific-popup/
  // ----------------------------------------------------------------
  if (jQuery('[data-toggle="magnific-popup"]').length > 0) {
    var initMagnificPopup = function() {
      var magnificPopupSettingsDefault = {
        disableOn: 0,
        key: null,
        midClick: false,
        mainClass: '',
        preloader: true,
        focus: '', // CSS selector of input to focus after popup is opened
        closeOnContentClick: false,
        closeOnBgClick: true,
        closeBtnInside: true,
        showCloseBtn: true,
        enableEscapeKey: true,
        modal: false,
        alignTop: false,
        removalDelay: 0,
        prependTo: null,
        fixedContentPos: 'auto',
        fixedBgPos: 'auto',
        overflowY: 'auto',
        closeMarkup: '<button title="%title%" type="button" class="mfp-close">&times;</button>',
        tClose: 'Close (Esc)',
        tLoading: 'Loading...',
        type: 'image'
      };
      
      jQuery('[data-toggle="magnific-popup"]').each(function() {
        var magnificPopupSettings;
        var magnificPopupSettingsExtras = {};

        if ($(this).data('magnific-popup-settings') !== '') {
          magnificPopupSettingsExtras = $(this).data('magnific-popup-settings');
        }
        magnificPopupSettings = jQuery.extend(magnificPopupSettingsDefault, magnificPopupSettingsExtras);
        $(this).magnificPopup(magnificPopupSettings);
      });
    };
    jQuery().themeLoadPlugin(["magnific-popup/dist/jquery.magnific-popup.min.js"], ["magnific-popup/dist/magnific-popup.css"], initMagnificPopup);
  }

  // ----------------------------------------------------------------
  // Plugin: jQuery Zoom (image zoon)
  // @see: http://www.jacklmoore.com/zoom/
  // ----------------------------------------------------------------
  var imgZooms = jQuery('[data-img-zoom]');
  if (imgZooms.length > 0) {
    var initImgZoom = function() {      
      imgZooms.each(function() {
        var $this = $(this),
          imgLarge = $this.data('img-zoom'),
          imgZoomSettings = $this.data('img-zoom-settings') || {};
        
        imgZoomSettings.url = imgLarge;
          
        $this.addClass('d-block').zoom(imgZoomSettings);  
      });
    };
    jQuery().themeLoadPlugin(["https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.18/jquery.zoom.min.js"], [], initImgZoom);
  }
  
  // ----------------------------------------------------------------
  // Plugin: jQuery Countdown timer
  // @see: http://hilios.github.io/jQuery.countdown/
  // ----------------------------------------------------------------
  var countdownTimers = jQuery('[data-countdown]');
  if (countdownTimers.length > 0) {
    var initcountdownTimers = function() {      
      countdownTimers.each(function() {
        var $this = $(this),
          countTo = $this.data('countdown'),
          countdownFormat = $this.data('countdown-format') || null,
          coundownExpireText = $this.data('countdown-expire-text') || null;
          
        $this.countdown(countTo)
        .on('update.countdown', function(event) {
          if (countdownFormat === null) {
            countdownFormat = '%H hrs %M mins %S secs';
            if(event.offset.totalDays > 0) {
              countdownFormat = '%-d day%!d ' + countdownFormat;
            }
            if(event.offset.weeks > 0) {
              countdownFormat = '%-w week%!w ' + countdownFormat;
            }
          }
          $this.html(event.strftime(countdownFormat));
        })
        .on('finish.countdown', function(event) {
          if (coundownExpireText !== coundownExpireText) {
            $this.html(coundownExpireText);
          }
          $this.addClass('countdown-don');
        });  
      });
    };
    jQuery().themeLoadPlugin(["https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"], [], initcountdownTimers);
  }  
});

// ****************************************************************
// Custom jQuery extension functions
// 
// ****************************************************************
jQuery.fn.extend({
  // ----------------------------------------------------------------
  // Trigger callback when fakeLoader is loaded
  // ----------------------------------------------------------------
  isPageLoaderDone: function(callback) {
    var $loader = jQuery('[data-toggle="page-loader"]'),
    triggerCallback = function() {
      if (callback && typeof(callback) === "function") {
        callback();
      }
    };
      
    if ($loader.length == 0) {
      triggerCallback();
    }
    
    var isPageLoaderDoneTimer = setInterval(function() {
      if ($loader.css('display') == 'none') {
        pageLoaderDone = true;
        clearInterval(isPageLoaderDoneTimer);
        triggerCallback();
      }
    }, 500);
  },
  
  // ----------------------------------------------------------------
  // Plugin: Waypoints
  // @see: http://imakewebthings.com/waypoints/
  // Used as helper for other functions so not called direct
  // ----------------------------------------------------------------
  includeWaypoints: function(callback) {
    if(typeof jQuery.fn.waypoints === 'undefined') {
      jQuery().themeLoadPlugin(['https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js'], [], callback);
    }
    else {
      if (callback && typeof(callback) === "function") {
        callback();
      }
    }
  },
  
  // ----------------------------------------------------------------
  // Scroll links
  // ----------------------------------------------------------------
  themeScrollMenus: function() {
    var scrollLinks = $('[data-toggle="scroll-link"]');
    var $header = $('#header');
    var $body = $('body');
    var $spys = $('[data-spy="scroll"]');
    
    if (scrollLinks.length > 0) {
      var getHeaderOffset = function() {
        var offset = $header.outerHeight();
      
        if ($body.hasClass('header-compact-sticky')) {
          offset -= 35;
        }
        return offset;
      };
      
      var triggerSpy = function(state) {
        if (state == 'refresh') {
          var spyData = $body.data('bs.scrollspy');
          spyData._config.offset = getHeaderOffset();
          $body.data('bs.scrollspy', spyData)
          $body.scrollspy('refresh');          
        }
        else {       
          $body.scrollspy({
            target: '.navbar-main',
            offset: getHeaderOffset(),
          });
        }
      };
      
      triggerSpy('init');
      
      $(window).on('resize', function() {
        setTimeout(function() {
          triggerSpy('refresh');
        }, 200)
      });      
      
      scrollLinks.click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var $this = $(this),
            target = $(this.hash),
            offset = 2;
          
          var clickScroll = function() {
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html, body').animate({
                scrollTop: target.offset().top - getHeaderOffset() + offset,
              }, 1000);
            }
          }
          
          // If header changes size
          $(window).trigger('resize');
          clickScroll();
          return false;
        }
      });
    }
  },
  
  //submenu dropdowns
  // --------------------------------
  themeSubMenus: function () {
    jQuery('.dropdown-menu [data-toggle=dropdown]', jQuery(this)).on('click', function(event) {
      event.preventDefault();
      event.stopPropagation();
        
      // Toggle direct parent
      jQuery(this).parent().toggleClass('show');
    });
    
    // Persistent menus
    $('.dropdown.dropdown-persist').on({
        "shown.bs.dropdown": function() {
          $(this).data('closable', false);
        },
        "hide.bs.dropdown": function(event) {
          temp = $(this).data('closable');
          $(this).data('closable', true);
          return temp;
        }
    });
    $('.dropdown.dropdown-persist .dropdown-menu').on({
        "click": function(event) {
          $(this).parent('.dropdown.dropdown-persist').data('closable', false);
        },
    });    
  },
  
  // Load plugin
  // --------------------------------
  themeLoadPlugin: function(js, css, callback, placement) {
    var themeLoadPluginPath = function(url) {
      if (url.indexOf('http://') === 0 || url.indexOf('https://') === 0) {
        return url;
      }
      return PLUGINS_LOCALPATH + url;
    }

    $.ajaxPrefilter( "script", function( s ) {
      s.crossDomain = true;
    });
    if (js.length > 0) {
      var progress = 0;
      var internalCallback = function () {
        // Complete
        if (++progress === js.length) {
          $.each(css, function(index, value) {
            $('head').prepend('<link href="' + themeLoadPluginPath(value) + '" rel="stylesheet" type="text/css" />');
          });
          
          if (callback && typeof(callback) === "function") {
            callback();
          }
        }
      };
  
      if (placement === undefined) {
        $.each(js, function(index, value) {
          var options = {
            url: themeLoadPluginPath(value),
            dataType: "script",
            success: internalCallback,
            cache: true
          };
          $.ajax(options);
        });
      }
      else if (placement === 'append') {
        $.each(js, function(index, value) {
          $('script[src*="bootstrap.min.js"]').after('<script src="' + themeLoadPluginPath(value) + '"></script>');
          internalCallback();
        });
      }
      else if (placement === 'prepend') {
        $.each(js, function(index, value) {
          $('script[src*="bootstrap.min.js"]').before('<script src="' + themeLoadPluginPath(value) + '"></script>');
          internalCallback();
        });
      }
      else if (placement === 'head') {
        $.each(js, function(index, value) {
          $('head').append('<script src="' + themeLoadPluginPath(value) + '"></script>');
          internalCallback();
        });      
      }
    }
    else if (css.length > 0) {
      // Just CSS
      $.each(css, function(index, value) {
        $('head').prepend('<link href="' + themeLoadPluginPath(value) + '" rel="stylesheet" type="text/css" />');
      });
      
      if (callback && typeof(callback) === "function") {
        callback();
      }
    }
  }
});


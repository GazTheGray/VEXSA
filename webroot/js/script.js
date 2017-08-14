/**
 * Created by Nihilum on 2016/08/18.
 */
/**
 * @function      Include
 * @description   Includes an external scripts to the page
 * @param         {string} scriptUrl
 */
function include(scriptUrl)
{
  document.write('<script src="' + scriptUrl + '"></script>');
}


/**
 * @function      isIE
 * @description   checks if browser is an IE
 * @returns       {number} IE Version
 */
function isIE()
{
  var myNav = navigator.userAgent.toLowerCase(),
    msie = (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;

  if (!msie)
  {
    return (myNav.indexOf('trident') != -1) ? 11 : ( (myNav.indexOf('edge') != -1) ? 12 : false);
  }

  return msie;
};

/**
 * @module       IE Fall&Polyfill
 * @description  Adds some loosing functionality to old IE browsers
 */
;
(function ($)
{
  var ieVersion = isIE();

  if (ieVersion === 12)
  {
    $('html').addClass('ie-edge');
  }

  if (ieVersion === 11)
  {
    $('html').addClass('ie-11');
  }

  if (ieVersion && ieVersion < 11)
  {
    $('html').addClass('lt-ie11');
    $(document).ready(function ()
    {
      PointerEventsPolyfill.initialize({});
    });
  }

  if (ieVersion && ieVersion < 10)
  {
    $('html').addClass('lt-ie10');
  }
})(jQuery);


/**
 * @module       Copyright
 * @description  Evaluates the copyright year
 */
;
(function ($)
{
  $(document).ready(function ()
  {
    $("#copyright-year").text((new Date).getFullYear());
    
  });
})(jQuery);


/**
 * @module       WOW Animation
 * @description  Enables scroll animation on the page
 */
;
(function ($)
{
  var o = $('html');
  if (o.hasClass('desktop') && o.hasClass("wow-animation") && $(".wow").length)
  {
    $(document).ready(function ()
    {
      new WOW().init();
    });
  }
})(jQuery);


/**
 * @module       ToTop
 * @description  Enables ToTop Plugin
 */
;
(function ($)
{
  var o = $('html');
  if (o.hasClass('desktop'))
  {

    $(document).ready(function ()
    {
      $().UItoTop({
        easingType: 'easeOutQuart',
        containerClass: 'ui-to-top fa fa-  fa-chevron-up'
      });
    });
  }
})(jQuery);

/**
 * @module       Responsive Tabs
 * @description  Enables Easy Responsive Tabs Plugin
 */
;
(function ($)
{
  var o = $('.responsive-tabs');
  if (o.length > 0)
  {
    $(document).ready(function ()
    {
      o.each(function ()
      {
        var $this = $(this);
        $this.easyResponsiveTabs({
          type: $this.attr("data-type") === "accordion" ? "accordion" : "default"
        });
      })
    });
  }
})(jQuery);

/**
 * @module       RD Mailform
 * @description  Enables RD Mailform Plugin
 */
;
(function ($)
{
  var o = $('.rd-mailform');
  if (o.length > 0)
  {
    $(document).ready(function ()
    {
      var o = $('.rd-mailform');

      if (o.length)
      {
        o.rdMailForm({
          validator: {
            'constraints': {
              '@LettersOnly': {
                message: 'Please use only letters.'
              },
              '@NumbersOnly': {
                message: 'Please use only numbers.'
              },
              '@NotEmpty': {
                message: 'This field should not be empty.'
              },
              '@Email': {
                message: 'Enter valid e-mail address.'
              },
              '@Phone': {
                message: 'Enter valid phone number.'
              },
              '@Date': {
                message: 'Use MM/DD/YYYY format.'
              },
              '@SelectRequired': {
                message: 'Please choose an option.'
              }
            }
          }
        }, {
          'MF000': 'Sent',
          'MF001': 'Recipients are not set.',
          'MF002': 'Form will not work locally.',
          'MF003': 'Please define email field in your form.',
          'MF004': 'Please define the type of your form.',
          'MF254': 'Something went wrong with PHPMailer.',
          'MF255': 'There was an error submitting the form.'
        });
      }
    });
  }
})(jQuery);


/**
 * @module       RD Navbar
 * @description  Enables RD Navbar Plugin
 */
;
(function ($)
{
  var o = $('.vesa-navbar');
  if (o.length > 0)
  {
    $(document).ready(function ()
    {
      o.RDNavbar({
        stuckWidth: 768,
        stuckMorph: true,
        stuckLayout: "vesa-navbar-static",
        responsive: {
          0: {
            layout: 'vesa-navbar-fixed',
            focusOnHover: false
          },
          768: {
            layout: 'vesa-navbar-fullwidth'
          },
          1200: {
            layout: o.attr("data-vesa-navbar-lg").split(" ")[0],
          }
        },
        onepage: {
          enable: false,
          offset: 0,
          speed: 400
        }
      });
    });
  }
})(jQuery);

/**
 * @module       RD Parallax 3
 * @description  Enables RD Parallax 3 Plugin
 */
;
(function ($)
{
  var o = $('.rd-parallax');
  if (o.length)
  {
    $(document).ready(function ()
    {
      $.RDParallax();
    });
  }
})(jQuery);


/**
 * @module       RD Search
 * @description  Enables RD Search Plugin
 */
;
(function ($)
{
  var o = $('.vesa-navbar-search');
  if (o.length)
  {
    $(document).ready(function ()
    {
      o.RDSearch({});
    });
  }
})(jQuery);



function vesaModal(header, content, footer, callback)
{
  $('#vesaModal').modal('show');

  $('.modal-title').text(header);
  $('.modal-body').html(content);

  if (footer != '')
  {
    $('.modal-footer').html(footer);
  }

  if (typeof callback == "function")
  {
    callback();
  }
}

function readMore(title, body, date)
{
  var content = '<span class="fa-calendar" style="margin-right: 20px;"></span>' + date;


  var strData = body.replace("\\n", "<br />");

  content += '<br>';
  content += '<p>' + strData + '</p>';

  vesaModal(title, content, '', function ()
  {

  });
}

function privacyPolicy()
{
  var content = '<span class="fa-copyright" style="margin-right: 20px;"></span>';
  var body = 'Privacy Policy Details';

  content += '<br>';
  content += '<p>' + body + '</p>';

  vesaModal('VESA Privacy Policy', content, '', function ()
  {

  });
}


function showHideModels()
{
  var brandID = $('#selected_brand').find('option:selected').attr('id');
  var brandName = $('#selected_brand').val();
  var hideThese = [];

  $("#selected_model").find('option').each(function ()
  {
    if ($(this).attr('id') == brandID)
    {
      hideThese.push($(this).text());
      $(this).removeClass('hide');
    }
    else
    {
      $(this).addClass('hide');
    }
  });

  $("#selected_label_model").find('li').each(function ()
  {
    if ($.inArray($(this).text(), hideThese) !== -1)
    {
      $(this).removeClass('hide');
    }
    else
    {
      $(this).addClass('hide');
    }
  });
}

function hideModelsSelect()
{
  $("#selected_label_model").find('li').each(function ()
  {
  console.log('BOOOP');
    if ($(this).text() !== "Select a Make")
    {
      $(this).addClass('hide');
    }
  });
}

function faceCS()
{
  var content = '<a href="javascript:void(0)" class="icon icon-sm icon-silver fa-facebook"></a> links will be here soon.';

  vesaModal('Coming Soon!', content, '', function ()
  {

  });
}
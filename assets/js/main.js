$(document).ready(function() {
    $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
/////////////////////////// Gallerie: http://bootsnipp.com/snippets/7XVM2
    $('.thumbnail').click(function() {
        $('.modal-body').empty();
        //var title = $(this).parent('a').attr("title");
        //$('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#myModal').modal({
            show: true
        });
    });
////////////////////////// BUTTON CHECKBOX: http://bootsnipp.com/snippets/xG8am
    $('.button-checkbox').each(function() {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'fa fa-square-o'
                }
            };

        // Event Handlers
        $button.on('click', function() {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function() {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            } else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });

/////////////////// Google Maps API

/////////////////// Like Funktion
$(document).ready(function() {
$("#linkeBtn").removeAttr("disabled");
$("#unlinkeBtn").removeAttr("disabled");
$('#linkeBtn').click(function(e)
    {
        var val = parseInt($("#linkeBtn").val(), 10);
        $.post("index.php", {op:"like"},function(data)
        {
            if(data==1)
            {
                $("#status").html("Liked Sucessfully!!");
                val = val+1;
                $("#linkeBtn").val(val);
                $("#linkeBtn").attr("disabled", "disabled");
                $("#linkeBtn").css("background-image","url(likebw.png)");
            }
            else
            {
                $("#status").html("Already Liked!!");
            }
        })
    });
    $('#unlinkeBtn').click(function(e)
    {
        var val = parseInt($("#unlinkeBtn").val(), 10);
        $.post("index.php", {op:"un-like"},function(data)
        {
            if(data==1)
            {
                val = val+1;
                $("#unlinkeBtn").val(val);
                $("#unlinkeBtn").attr("disabled", "disabled");
                $("#unlinkeBtn").css("background-image","url(likebw.png)");
                $("#status").html("Un-liked Sucessfully!!");
            }
            else
            {
                $("#status").html("Already Un-liked!!");
            }
        })
    });
});




});

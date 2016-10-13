$(document).ready(function() {
    $('#contactForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 4,
                        message: 'The name must be more than 3 characters long'
                    }
                }
            },
            login: {
                validators: {
                    notEmpty: {
                        message: 'The Login is required and cannot be empty'
                    },
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'The message is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        message: 'The message must be more than 5 characters long'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            }

        }
    });
    $('#replyForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                    stringLength: {
                        min: 4,
                        message: 'The name must be more than 3 characters long'
                    }
                }
            },
            message: {
                validators: {
                    notEmpty: {
                        message: 'The message is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        message: 'The message must be more than 5 characters long'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            }

        }
    });

    /*$('#search_messages input').change(function() {
        $(this).closest('form').submit();
    });*/

    $(document).on('click','.reply_button',function() {
        var parent_id = $(this).attr('data-parent');
        $('.parent').val(parent_id);
    });

    $(".datepicker_input").datepicker({
        dateFormat: 'yy-mm-dd'
    });




});
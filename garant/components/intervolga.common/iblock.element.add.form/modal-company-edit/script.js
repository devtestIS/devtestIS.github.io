$(document).ready(function () {
    $('[data-field-name]').change(
        function () {
            var field = $(this),
                fieldName = field.data("field-name");

            if (fieldName == "NAME")
            {
                if (field.val().length > 90)
                {
                    if (!$('[data-field-name="' + fieldName + '_ERROR"]').length)
                    {
                        if (field.closest('.company__property').length)
                        {
                            field.closest('.company__property').after('<p style="color: red" data-field-name="' + fieldName + '_ERROR">Превышен максимальный размер текста</p>');
                        }
                    }
                }
                else
                {
                    if ($('[data-field-name="' + fieldName + '_ERROR"]').length)
                    {
                        $('[data-field-name="' + fieldName + '_ERROR"]').remove();
                    }
                }
            }

            if (fieldName == "PREVIEW_TEXT")
            {
                if (field.val().length > 270)
                {
                    if (!$('[data-field-name="' + fieldName + '_ERROR"]').length)
                    {
                        if (field.closest('.company__property').length)
                        {
                            field.closest('.company__property').after('<p style="color: red" data-field-name="' + fieldName + '_ERROR">Превышен максимальный размер текста</p>');
                        }
                    }
                }
                else
                {
                    if ($('[data-field-name="' + fieldName + '_ERROR"]').length)
                    {
                        $('[data-field-name="' + fieldName + '_ERROR"]').remove();
                    }
                }
            }
        }
    );
});
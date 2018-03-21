$(function(){
    $('#selectCompareSection').change(function(){
        $(this).closest('form').submit();
    });
    $('#selectCompareSectionSmall').change(function(){
        $(this).closest('form').submit();
    });
});
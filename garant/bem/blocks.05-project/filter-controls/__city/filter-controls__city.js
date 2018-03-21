document.addEventListener('OnDocumentHtmlChanged', function () {
    if ($('#select-cities').length) {
        $('#select-cities').selectize({
            plugins: ['remove_button'],
            delimiter: ',',
        });
    }
}, false);

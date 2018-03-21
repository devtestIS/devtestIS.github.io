var bower = require('bower'),
    gulp = require('gulp');

console.log('Running postinstall tasks');
bower.commands
    .install([], {save: false}, {interactive: true})
    .on('end', function (installed) {
        require('./gulpfile.js');
        gulp.start('postinstall');
        console.log('Finished postinstall tasks');
    });

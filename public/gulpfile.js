// Assigning modules to local variables
var gulp = require('gulp');
var less = require('gulp-less');
var browserSync = require('browser-sync').create();
var header = require('gulp-header');
var cleanCSS = require('gulp-clean-css');
var rename = require("gulp-rename");
var uglify = require('gulp-uglify');
var pkg = require('./package.json');

// Set the banner content
var banner = ['/*!\n',
    ' * Start Bootstrap - <%= pkg.title %> v<%= pkg.version %> (<%= pkg.homepage %>)\n',
    ' * Copyright 2013-' + (new Date()).getFullYear(), ' <%= pkg.author %>\n',
    ' * Licensed under <%= pkg.license.type %> (<%= pkg.license.url %>)\n',
    ' */\n',
    ''
].join('');

// Default task
// Default task
gulp.task('default', ['less', 'minify-css', 'minify-js', 'copy']);

// Less task to compile the less files and add the banner
gulp.task('less', function() {
    return gulp.src(['assets/less/clean-blog.less', 'assets/less/bo.less'])
        .pipe(less())
        .pipe(header(banner, { pkg: pkg }))
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.reload({
            stream: true
        }));
});

// Minify CSS
gulp.task('minify-css', function() {
    return gulp.src(['assets/css/clean-blog.css','assets/css/bo.css'])
        .pipe(cleanCSS({ compatibility: 'ie8' }))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.reload({
            stream: true
        }));
});

// Minify JS
gulp.task('minify-js', function() {
    return gulp.src(['assets/js/clean-blog.js', 'assets/js/bo.js'])
        .pipe(uglify())
        .pipe(header(banner, { pkg: pkg }))
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('assets/js'))
        .pipe(browserSync.reload({
            stream: true
        }));
});

// Copy Bootstrap core files from node_modules to vendor directory
gulp.task('bootstrapcss', function() {
    return gulp.src('node_modules/bootstrap/dist/css/**')
        .pipe(gulp.dest('assets/css/bootstrap'));
});
gulp.task('bootstrapjs', function() {
    return gulp.src('node_modules/bootstrap/dist/js/**')
        .pipe(gulp.dest('assets/js/bootstrap'));
});
gulp.task('bootstrapfonts', function() {
    return gulp.src('node_modules/bootstrap/dist/fonts/**')
        .pipe(gulp.dest('assets/fonts/bootstrap'));
});

gulp.task('typeahead', function() {
	return gulp.src([
		'node_modules/typeahead.js/dist/typeahead.bundle.min.js',
		'node_modules/typeahead.js/dist/bloodhound.min.js',
		'node_modules/typeahead.js/dist/typeahead.jquery.min.js',
		
	]).pipe(gulp.dest('assets/js'));
});

// Copy jQuery core files from node_modules to vendor directory
gulp.task('jquery', function() {
    return gulp.src(['node_modules/jquery/dist/jquery.js', 'node_modules/jquery/dist/jquery.min.js'])
        .pipe(gulp.dest('assets/js/jquery'));
});

// Copy Font Awesome core files from node_modules to vendor directory
gulp.task('fontawesome', function() {
    return gulp.src([
            'node_modules/font-awesome/**',
            '!node_modules/font-awesome/**/*.map',
            '!node_modules/font-awesome/.npmignore',
            '!node_modules/font-awesome/*.txt',
            '!node_modules/font-awesome/*.md',
            '!node_modules/font-awesome/*.json'
        ])
        .pipe(gulp.dest('assets/font-awesome'));
});

// Copy all third party dependencies from node_modules to vendor directory
gulp.task('copy', ['bootstrapcss','bootstrapjs','bootstrapfonts', 'jquery', 'fontawesome', 'typeahead']);

// Configure the browserSync task
gulp.task('browserSync', function() {
    browserSync.init({
		proxy: 'localhost/testw3f/public'
    });
});
		

// Watch Task that compiles LESS and watches for HTML or JS changes and reloads with browserSync
gulp.task('dev', ['browserSync', 'less', 'minify-css', 'minify-js'], function() {
    gulp.watch('assets/less/*.less', ['less']);
    gulp.watch('assets/css/*.css', ['minify-css']);
    gulp.watch('assets/js/*.js', ['minify-js']);
    // Reloads the browser whenever HTML or JS files change
    gulp.watch('../app/***/**/*.php', browserSync.reload);
    gulp.watch('assets/js/**/*.js', browserSync.reload);
});
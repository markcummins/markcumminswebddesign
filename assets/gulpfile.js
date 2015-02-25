'use strict';

var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var gp_rename = require('gulp-rename');
var wrap = require("gulp-wrap");
var chalk = require('chalk');
var plumber = require('gulp-plumber');

var fe_js = [
	'js_fe/jquery-1.11.2.js', 
	'js_fe/vendor/bootstrap.min.js',
	'js_fe/dependent/greensock/TweenMax.min.js', 
	'js_fe/examples/general.js',
	'js_fe/examples/highlight.pack.js',
	'js_fe/examples/modernizr.custom.min.js',
	'js_fe/vendor/jquery.scrollmagic.js',
	'js_fe/vendor/jquery.scrollmagic.debug.js',
	'js_fe/Chart.Core.js',
	'js_fe/Chart.Doughnut.js',
	'js_fe/Chart.PolarArea.js',
	'js_fe/Chart.Radar.js',
	'js_fe/vendor/snap.svg-min.js',
	'js_fe/svg_head.js',
	'js_fe/svg_a.js',
	'js_fe/svg_b.js',
	'js_fe/svg_c.js',
	'js_fe/maps.js?key=AIzaSyAjMTyZ7wKxUBJAsxuO9silbzU5g0JB7uo',
	'js_fe/main.js'
];
	
var gt_js = [
	'js/jquery-1.11.2.js', 
	'js/vendor/bootstrap.min.js',
	'js/vendor/jquery-ui-1.11.3/jquery-ui.js',
	'js/vendor/moment.js',
	'js/vendor/Chart.Core.js',
	'js/vendor/Chart.Doughnut.js',
	'js/vendor/jsonsql.js',
	'js/main.js',
];

gulp.task('merge_js', function() {
		
	gulp.src(gt_js)
		.pipe(wrap('(function(){\n<%= contents %>\n})();'))
	.pipe(concat('gt_js.js'))
		.pipe(gulp.dest('dist'))
		
	console.log(chalk.bgGreen('-------- JS Merged --------'));
	
	return gulp.src(fe_js)
		.pipe(wrap('(function(){\n<%= contents %>\n})();'))
	.pipe(concat('frontend.js'))
		.pipe(gulp.dest('dist'))			  	
});
	
gulp.task('build_js', ['merge_js'], function buildJS() {

	gulp.src('dist/frontend.js')
		.pipe(plumber())
		.pipe(gp_rename('frontend.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('dist/'));

	gulp.src('dist/gt_js.js')
		.pipe(plumber())
	.pipe(gp_rename('gt_js.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('dist/'));
	
	console.log(chalk.bgGreen('-------- JS Minified --------'));
});





gulp.task('watch', function watch() {
	gulp.watch(['js/*.js'], ['build_js']);
	gulp.watch(['js_fe/*.js'], ['build_js']);
});



gulp.task('check_js', function() {
	console.log();
	console.log('-------------------------FRONTEND JS-------------------------');
	var arrayLength = fe_js.length;
	for (var i = 0; i < arrayLength; i++) {
    	console.log(chalk.bgYellow(fe_js[i]));
	}
	console.log();
	console.log('-------------------------gt_js JS-------------------------');
	var arrayLength = gt_js.length;
	for (var i = 0; i < arrayLength; i++) {
		console.log(chalk.bgGreen(gt_js[i]));
	}
	console.log('-----------------------------------------------------------');
	console.log();
});

gulp.task('help', function() {
	
	console.log();
	console.log();
	console.log('-------------------------'+chalk.bgGreen('GULP HELP')+'-------------------------');
	console.log();
	console.log(chalk.bgYellow('gulp watch') + ': watches js/*.js and executes '+ chalk.bgYellow('build_js') +' on change');
	console.log(chalk.bgYellow('gulp watch') + ': watches less/bootstrap/* and executes '+ chalk.bgYellow('build_css') +' on change');
	console.log(chalk.bgGreen('note') + ': merging files is instantaneous');
	console.log(chalk.bgGreen('note') + ': minifying js files takes around ' + chalk.green('10 secs'));
	console.log();
	console.log(chalk.bgYellow('gulp build_js')+ ': Merge & Minify js to');
	console.log(chalk.bgWhite(chalk.grey('frontend.min.js')) + ' &'); 
	console.log(chalk.bgWhite(chalk.grey('gt_js.min.js')));
	console.log();
	console.log(chalk.bgYellow('gulp build_css')+ ': Merge & Minify css to ');
	console.log(chalk.bgWhite(chalk.grey('public/lib/bootstrap/dist/css/bootstrap.css')) + ' &'); 
	console.log(chalk.bgWhite(chalk.grey('public/lib/bootstrap/dist/css/bootstrap.min.css')));
	console.log();
	console.log(chalk.bgYellow('gulp check_js')+  ': check included js files to be merged');
	console.log();
	console.log('-----------------------------------------------------------');
	console.log();
});

// Handle the error
function errorHandler(error) {
  console.log(error.toString());
  //this.emit('end');
}
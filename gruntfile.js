module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		// Add Sass pre-processor features to 'src' CSS, then compile to 'dist' file.
		sass: {
			dist: {
				files: {
					'style.css': 'src/css/styles.scss'
				}
			}
		},

		// Concatenate all JS files in 'src'.
		// concat: {
		// 	js: {
		// 		options: {
		// 			separator: ';'
		// 		},
		// 		src: ['src/js/**/*.js', 'src/js/**/*.min.js', '!src/js/scripts.min.js'],
		// 		dest: 'src/js/scripts.min.js'
		// 	}
		// },
		//
		// // Uglify the concatenated JS file in 'src' and move it to 'dist'.
		// uglify: {
		// 	options: {
		// 		banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd")' +
		// 			' %> */\n',
		// 		mangle: false
		// 	},
		// 	build: {
		// 		src: 'src/js/scripts.min.js',
		// 		dest: 'dist/scripts.min.js'
		// 	}
		// },

		// Watch 'src/css/**/*.scss' & 'src/js/**/*.js' files and run all tasks after changes.
		watch: {
			styles: {
				files: ['src/css/**/*.scss'],
				tasks: ['sass'] // , 'cssmin'
			},
			// js: {
			// 	files: ['src/js/**/*.js'],
			// 	tasks: ['concat:js', 'uglify:build']
			// }
		},

	});

	// Load the plugins that provide the tasks.
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-concat');

	// Running 'grunt watch' does the entire job
};

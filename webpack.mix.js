const path = require('path');
const mix = require('laravel-mix');

mix
  .js('resources/bundles/admin/js/app.js', 'public/admin/js')
  .sass('resources/bundles/admin/sass/app.scss', 'public/admin/css')
  .options({
    allChunks: true,
    processCssUrls: true,
  })
  .webpackConfig({
    resolve: {
      alias: {
        Admin: path.resolve(__dirname, 'resources/bundles/admin/js'),
      }
    },
    output: {
      chunkFilename: 'admin/js/chunk/[name].js',
    }
  });
mix.sourceMaps()

if (mix.inProduction()) mix.version();

// mix
//   .js('resources/js/app.js', 'public/js')
//   .sass('resources/sass/app.scss', 'public/css');

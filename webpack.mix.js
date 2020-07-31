const path = require('path');
const mix = require('laravel-mix');

/* Admin bundle */
// mix
//   .js('resources/bundles/admin/js/app.js', 'public/admin/js')
//   .sass('resources/bundles/admin/sass/app.scss', 'public/admin/css')
//   .options({
//     allChunks: true,
//     processCssUrls: true,
//   })
//   .webpackConfig({
//     resolve: {
//       alias: {
//         Admin: path.resolve(__dirname, 'resources/bundles/admin/js'),
//       }
//     },
//     output: {
//       chunkFilename: 'admin/js/chunk/[name].js',
//     }
//   });

/* Client bundle */
mix
  .js('resources/bundles/client/js/app.js', 'public/client/js')
  .sass('resources/bundles/client/sass/app.scss', 'public/client/css')
  .options({
    allChunks: true,
    processCssUrls: true,
  })
  .webpackConfig({
    resolve: {
      alias: {
        Client: path.resolve(__dirname, 'resources/bundles/client/js'),
      }
    },
    output: {
      chunkFilename: 'client/js/chunk/[name].js',
    }
  });

mix.sourceMaps();

if (mix.inProduction()) mix.version();

// mix
//   .js('resources/js/app.js', 'public/js')
//   .sass('resources/sass/app.scss', 'public/css');

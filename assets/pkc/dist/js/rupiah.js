    var nilaiMask = IMask(
      document.getElementById('nilai'),
      {
        mask: 'Rp num',
        blocks: {
          num: {
            // nested masks are available!
            mask: Number,
            thousandsSeparator: ' '
          }
        }
      });

      var nilaiMask = IMask(
        document.getElementById('nilairev'),
        {
          mask: 'Rp num',
          blocks: {
            num: {
              // nested masks are available!
              mask: Number,
              thousandsSeparator: ' '
            }
          }
        });

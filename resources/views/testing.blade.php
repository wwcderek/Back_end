<img src="data:image/png;base64, {{ base64_encode(QrCode::encoding('UTF-8')->format('png')->margin(1)->size(220)->generate('0023|m123|project|menu')) }}">

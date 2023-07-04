//[Dashboard Javascript]

//Project:	Crypto Tokenizer UI Interface & Cryptocurrency Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

	new TradingView.widget(
	  {
	  "width": "100%",
	  "height": 610,
	  "symbol": "NASDAQ:AAPL",
	  "interval": "D",
	  "timezone": "Etc/UTC",
	  "theme": "light",
	  "style": "1",
	  "locale": "en",
	  "toolbar_bg": "#f1f3f6",
	  "enable_publishing": true,
	  "withdateranges": true,
	  "allow_symbol_change": true,
	  "show_popup_button": true,
	  "popup_width": "1000",
	  "popup_height": "650",
	  "container_id": "tradingview_7dad1"
	}
	  );
		
}); // End of use strict

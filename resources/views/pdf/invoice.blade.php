<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DomPDF && Laravel 7</title>

        <style>
			@page { margin: 0px; }

			body {
				font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			}

			hr {
				opacity: 20%;
			}

			.header {
				background: #004380; 
				color: white;
			}

			.inline-block {
				display: inline-block;
			}

			.title {
				margin-bottom: 0px;
				margin-top:10px;
				font-size:26px;
			}

			.right {
			  position: absolute;
			  right: 0px;
			}

			.p-4 {
				padding: 1.5rem !important;
			}

			.card {
			  position: relative;
			  display: flex;
			  flex-direction: column;
			  min-width: 0;
			  word-wrap: break-word;
			  background-color: #fff;
			  background-clip: border-box;
			  border: 1px solid rgba(0, 0, 0, 0.125);
			  border-radius: 0.75rem;
			}

			.card-body {
			  flex: 1 1 auto;
			  padding: 1rem 1rem;
			  height: 80px;
			}

			.card-image {
				width: 40px; 
				height: 60%; 
				vertical-align: middle;
				display:inline-block; 
			}

			.card-image-70 {
				width: 40px; 
				display:inline-block; 
				height: 70%; 
				vertical-align: middle;
			}

			.card-title {
				width: 165px; 
				height: 60%; 
				display:inline-block; 
				padding-top: 10px;
			}

			.card-title-70 {
				width: 165px; 
				height: 70%; 
				display:inline-block; 
				padding-top: 10px;
			}

			.div-card-left {
				display:inline-block; width: 247px; padding-right: 8px;
			}

			.div-card-right {
				display:inline-block; width: 247px;
			}

			.detail {
				font-size: 11px; 
				margin-left: 5px; 
				opacity: 70%;
			}

			.pt-0 {
				padding-top: 0px;
			}

			.pt-10 {
				padding-top: 10px;
			}

			.pt-15 {
				padding-top: 15px;
			}

			.pt-20 {
				padding-top: 20px;
			}

			.pt-25 {
				padding-top: 25px;
			}

			.pr-25 {
				padding-right: 25px;
			}

			.pr-50 {
				padding-right: 50px;
			}

			.p-5-20 {
				padding: 5px 20px;
			}

			.mt-0 {
				margin-top: 0px;
			}

			.m-5-0 {
				margin: 5px 0px;
			}

			.op-50 {
				opacity: 50%;
			}

			.ft-12 {
				font-size: 12px;
			}

			.ft-13 {
				font-size: 13px;
			}

			.ft-16 {
				font-size: 16px;
			}

		</style>
    </head>
    <body style="margin: 0px">
        <div class="header p-4">
        	<div>
		      	<div class="inline-block">
		         	<span style="font-weight: bold;">Reporte de estadísticas</span>
		      	</div>
		      	<div class="right inline-block pr-25">
		         	<img src="{{ public_path('assets/images/group.png') }}" style="width: 30px">
					<span>NAUTICA SALES</span>
		      	</div>
			 </div>
			 <hr>
			 <div class="pt-10">
		      	<div class="inline-block">
		         	<span class="op-50">Lancha /</span>
		         	<span>Venta</span>
		      	</div>
		      	<div  class="right inline-block pr-25">
		         	<span>01/01/2023 – 14/06/203</span>
		      	</div>
			 </div>
			 <div class="pt-20">
			 	<div class="inline-block">
			 		<p class="title">Mariem Princess</p>
					<span class="op-50">Intermarine</span>
			 	</div>
			 	<div class="right inline-block pr-25">
			 		<span class="op-50 ft-13">Publicación</span> <br> <p class="ft-13">#986484</p>
 				</div>
 				<div class="right inline-block" style="padding-right: 140px">
					<span class="op-50 ft-13">Ubicación</span> <br> <p class="ft-13">Florida, Estados Unidos</p>
				</div>
				<div class="right inline-block" style="padding-right: 330px">
			 		<span class="op-50 ft-13">Condición</span> <br> <p class="ft-13">Usado</p>
 				</div>
 				<div class="right inline-block" style="padding-right: 430px">
					<span class="op-50 ft-13">Precio</span> <br> <p class="ft-13">$21,750.00</p>
				</div>
			 </div>
			 <hr>
			 <div class="pt-10">
		      	<div class="inline-block">
		         	<span class="op-50">Vendedor</span>
		         	<span> Owner</span>
		      	</div>
		      	<div  class="right inline-block pr-25">
		         	<span>Ver publicación</span><a href="https://sample.com" target="_blank"><img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAACIAAAAhCAYAAAC803lsAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAF/SURBVFhH7Zc9csIwEEY5AjcIR2EmfdKn8hm4QFwCTbiB4QCMXSYVKTKTErqUlCkpKFIKfyCbtWYtyfIqpMjOvGF2rZXeWP5jMLhP1Z+ALd4CttiTl/Wnyl63reQfX2qz26vR0+LaRyeQAJP7RjLLr710EglERTDZeJI5aZxawlKffroVXFhFnlfvepg7inIBs98Esvvvg+5oRqvIeLLUQ/wCFxztN7FJILBePZ42JvNcD1EqLc9MMi+stG0N4CSSWaEOxx+deYrcWRZx0SaBYzSiitgkAI1oIi6J4eNUVy8RRcQlUVE9VfGLnvoYHRQq4ithhSYhIiISgCZdRcQkAE26iIhKAJr4ioRIoIer19DERyREInvbnsdZXwk0cYmEbgcEEOjljp+hiU2kzzUhKoJFafhKAFERgDcyoosEEBcBzqufIYpICP8iJr1E8BBKVxsRIIDwFsGHSszAXwu6XgOzUN2i0oHtsd5xbLEETVIMH6bsGg3Y4i1gi79Oqk6khD0co367WwAAAABJRU5ErkJggg==" style="width: 16px; height: 16px; padding-left: 5px;"></a>
		      	</div>
			 </div>
        </div>
        <div class="p-4">
        	<h2 class="mt-0">Estadísticas generales de Nautica Sales</h2>
        	<div class="pt-25">
        		<div class="div-card-left">
	        		<div class="card">
					  <div class="card-body p-2">
					    <div>
					    	<div class="card-image">
					    		<img class="pt-3" src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAADIAAAA3CAYAAABO8hkCAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPKSURBVGhD7Zi/bhNBEIfzCHkEHiGPEIkeXNPgKi1RehKXIQ1uIujiVKEAOR2hCgUopelSgOTSdC5ASnn4M54wnszu7drns4XuJ/0Ux74/8+3Mzu7dVvGfqAHZNDUgm6YGJKbBj1FxdjUouu9vis759b35//rbsBj/vpsdWZ0qASEwgtw96BXbT46LrcedUu/svS3ary6n0FVoKRAAOuefk4MPGajeJIPLaGGQKgCsARr+HM/ukKdsEG5ECXmBVGUGKVdZINRz1VkIef/0anbXNCWD1AkhphmkKgmEcqobQpyamVIQIB4967o3qcvdDzezaMIqBSG93sXrdtl6EwVhdfYuug7TKWOKgqy7pKzZ3oQUBFk0GzSFo8m+ipvK4jb+dfd3//VpULQOL9zzUhzLShAkd9Eje7ER0xqOxpO513evU+bQPVwQRtK7SMgvJi2SURdxM9omWw4A+cvAsLGULCGOyy3fUDt2QXLK6khtJwgsJZMEI+BkJwdm++nx9DwrF6R1+M69iLWG4HlD/7Z7cDYdEODw68laoAPms2QnF0ZnVeSCUAreBbQpJ5GGYLITuCey8FytSwQv6wMwjLb8FnNv0jSsXBDvZG0CENlM0Jm0CJQMazhdfjozZE1fK2RvpX8Awqh5J2tLUP0vt3Pf01qtOFZ+lwAG30dz5+m2mjrHrB6AkGLvZDFtU2Tr2mYD6S0OpSOT3JavQGrwkNsn/2IQZYP0v95Oj/M6m2SKUiFb3ujKnLDrSAzSOgmkrLTk6c0bOYGMLXYCYiFjmbZmXlq5kz3WPfTI7Z9+nPstBol1k7D3oBJQyhqWNNlRWWplsgGkR09D2nWDdSUUrKxHlGRZNrCUsJYLYkfa8/18MP3fPp5ynF7AKC39tKnXo9bLtIVYBkvLBQmVhjYjJwESnB5JMqqDR947sNCiGrNu1VouCMSxeSLWMGTGTmCA+I6/GoDPlJ4oFQKHHntdEJRSXljDINYS5oN3LABcV+YKyoHA+lytIEhKeYnJnn3lyQ25BhMbS9sVAe+tMzHrFm0VBEGpu2Ax2QEo9rYduEVft4aygaIgnJgyVzwz2u2Ty2np0K75rBtCrnVj8BQFQak70lWaAfBarlYpCNLPEHWbEoyVlCgJhNEoW+1XZW9H7SkJBK0DJhUCJYMgYGI726pMOdHdcpQFIuIFnBdAFdabyxwtBIK4WZXZsduWXC0MIloWiHlHhsvaa5mWBhERCJMTqJ29N27QmJGnfOT9cFWqDMQT+yntZUc9ppWC1KkGZNPUgGyaGpDNUlH8AYQdK7vXF/0GAAAAAElFTkSuQmCC" style="width: 40px">
					    	</div>
					    	<div class="card-title">
					    		<span class="ft-16">Visitas generales</span>
					    		<h2 class="m-5-0">39,564</h2>
					    	</div>
					    </div>
					    <div>
					    	<span class="detail">Total de visitas en nauticasales.com</span>
					    </div>
					  </div>
					</div>
	        	</div>
	        	<div class="div-card-left">
	        		<div class="card">
					  <div class="card-body p-2">
					    <div>
					    	<div class="card-image">
					    		<img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAADAAAAAxCAYAAACcXioiAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAM7SURBVGhD7Zm/bhNBEMbzCHkDeIQ8QiR6oKZylTrKAxCXhMpNBJ2dCgqQ0xGqUIBSmi4FSC5D5wKklIt/l5to7zy7O7t3dgTyJ31FdN7b+ebfzl523D+OrYCHxlaAj/mvhRtfzNzow5Ubnl3ek78vv8+r532jk4DFn9vK4Ocv37vdp6/czpNhko9fjNzg5LwS1AeKBGD48OyL2egQETNZOqALsgWMPl51NrxNhJSml1kAG+wfTVQD+iJRzYVJAMbjJW3Tvkk9LX7f1junkRSA8X2nTIp7B2/NIqICNun5NomEBUEBdJouxhO1vYM3FbXnFh6eXtTWhBEUwGLtpSkiut3j5zcLd7w80LTfp5g6L1QBpI72shTbuct7iKRg9vNGXRcjDolBFVDSLtkITwO85qcfJ68IY7Tw11kYa68rAthce0mKg5NptT4UPZwCELL7LK+r8fsQVgTgLe0lKU6/XVfrD08/qc8h4gAdRnseY6gWGgLwjrbYQtmASGjPoeU3IUoE22gIOP96rS62cPL5biiL5bjUSEmNkUba4dYQEAt/in6Oa+fHcV2IpR0OamnUEFDiGZ+yAZ4mTfaPxst8f+fGdXRAaY1BJuE2GgIeKZ7LYdVK60LVUNJCfWonc0OAtqiEcuNCDORK2TW6cPD6rlX7WIuAdfH/F5B7QvqkYEkbrdUJmIUoaK1LWZgUUFLEGKO1txRKplOaQBsNAblHfNV16sNJvlQwkWo3OH7L+/2vELkiZFzx0RBAn9UWhij9nU6Tkxb+dJnTnUjBNhoCSAVtocb7k7fw5iaH0uyH7Y7AHhoaAoC1kMX7fJnTnqfozzaWKMi43saKAOtpKeHkxXinhFL8lhlMaq2NFQF4xRKF2MiQi5TTJF01rAgAliiUfEXTYKmhWJtWBVijsAmGcl+gCgDTDpebvkhkQrkvCAoAXS44fdBywkcFgJILeB+UG1wKSQHUQx+zfA6txoOkAMEm0okZyr9+WmAWALqMwikyBKYKVkOWACAXds2IEuJ1ptJSZAsQiJDSf36I4bELkAXFAnxwZiAm9r8ADObWhtElF6AQehHQBl6VLxKwq5djWIuATWIr4GHh3F+oTpLqEWOPsQAAAABJRU5ErkJggg==" style="width: 40px">
					    	</div>
					    	<div class="card-title">
					    		<span class="ft-16">Usuarios</span>
					    		<h2 class="m-5-0">5,942</h2>
					    	</div>
					    </div>
					    <div>
					    	<span class="detail">Total de visitantes únicos</span>
					    </div>
					  </div>
					</div>
	        	</div>
	        	<div class="div-card-right">
	        		<div class="card">
					  <div class="card-body p-2">
					    <div>
					    	<div class="card-image">
					    		<img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAADMAAAA0CAYAAAAnpACSAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAMNSURBVGhD7Zm/bhNBEIfzCHkDeAQeIRI9uKbBFXWUPn/KhAY3kehsqlCA7I5QhQKUMnQ0SC5D5wKklMd9xhOd1jN7c7fntYP8k35Sorvb229ndmf3vFP8R9rCbKq2MJuqlcFMf82K4eVNMfhwXZy8u7o3/199n86vd61OYehk//Wk2H12Wuw8Pan14xeDon82mT/XhZJhZn/uyhH/4gawDNiojGSKkmBIo1SI0EC1jVQrGKLRO3yvdqYrE+2magzDxGX0tA507Sev3haz33eLN9erEUxOEDHv8wK5YdYBIvZGyA1Dg9qLcnn//HLRE1suGIqd9oLcHn/9seiRrloY0ktrODRLdO/ooiyaY7e5X2vL8u7z02i61cJQobWGq2YuTW/bbU94rslcjC3ZURhvVIaf/1Vu6g8Fz2vaR5MyfbR2NceiE4XxRAXf/Lyd3793MFKvWybNENHRrlsefLyePxcqCuMNv4xwUxjuR01h5LlQJgxpoDWkOTcM1lLNhCGUWiOaQ5je4cXS/Kj65SJ9U2DG35aXaROmd+TfSIYwo8WCYEkGKgWG2hfKhJGOeRzCsOLwt2U5NvA3agNDnQplwjxqsPavY87Is1WtBIZ9HAc3y7LPexAwdXMGIO57EDDUp+oXmarZ/Ur9ygYjHfN4HXNGOxKYMPvnn9RGNNdFhtUtfAanwGhbGhNG8trjujljDUwKDMU3lAnT5AUhTLiaWXu8tjBEWpMJg6Rzdc49Z/pnywUTRWG8+7PcMFqKoSgMO1Nr8ladE4aUtRSFQaxGWqNVy+HsTRnJvYOh29yPGGmtXc1yqtVUC0N0rAks9nwGisl7omUAYqqFQZ6Ro0NEiJTzmvsZCK290Oy0SceYXDDo2JFuq3QsvURuGCQnxNw+dv4i0AgG5QbygqDGMChXyslq51UrGEQO161ybU27VmGMqTUMYnVha6F1qI1ZsYh67HtyTEkwIoFqG6lUCFEnMFXxswNbfgqcfIXROs917muTTpY6hwnFaFcLZerox7RymJzawmyqtjCbqaL4C6eGijM3oz2CAAAAAElFTkSuQmCC" style="width: 40px; padding-top: 0px">
					    	</div>
					    	<div class="card-title">
					    		<span class="ft-16">Páginas por usuarios</span>
					    		<h2 class="m-5-0">6.66</h2>
					    	</div>
					    </div>
					    <div>
					    	<span class="detail">Promedio de páginas que ve el visitante</span>
					    </div>
					  </div>
					</div>
	        	</div>
        	</div>
        	<div>
        		<div class="p-5-20">
			      	<div class="inline-block">
			         	<span>Tiempo promedio/visitante</span>
			      	</div>
			      	<div class="right inline-block pr-50">
			         	<span>3m 28s</span>
			      	</div>
				</div>
        		<div class="p-5-20" style="background-color: #F8F8F8;">
			      	<div class="inline-block">
			         	<span>Contador de eventos</span>
			      	</div>
			      	<div class="right inline-block pr-50">
			         	<span>95,499</span>
			      	</div>
				 </div>
				 <div class="p-5-20">
			      	<div class="inline-block">
			         	<span>Conversiones</span>
			      	</div>
			      	<div class="right inline-block pr-50">
			         	<span>49,796.00</span>
			      	</div>
				 </div>
			</div>
        </div>
        <div class="row p-4" style="background-color: #F8F8F8;">
        	<h2 class="mt-0">Estadísticas de la publicación</h2>
        	<div class="pt-25">
        		<div class="div-card-left">
	        		<div class="card">
					  <div class="card-body p-2">
					    <div>
					    	<div class="card-image-70">
					    		<img class="pt-3" src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAC8AAAAvCAYAAABzJ5OsAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAQlSURBVGhD7Zm/TxRBFMf5C/gL+AuwV2g1wQ4ttCDaUWhFQmJBh4b6epROo8kVNDRQQaIJhWJHgq1IVMJvOLjjOBj3s/qW2bk3e7PLHRcTXvJN7nZndj/vzZs3s7s95j+2G/hu2ZXhz84vzOFpw2yf1M3vo5r5eVgz6/vVWBsHtfjYZuXU7FXrpnZ2/q9Xe6wQ/MXFhdmvnZlfR6cJaKhwaCdytB2O5IIXaAA0sLxiRBrRyBW1YHgiZadEO7VXPYsDk9eC4A+iaGs3bacITN5RaAlPfmo364RwoN4IdyATfjcaTu0mndTGQTXYAS/8daSKT6EppMKf1BvqRa9TVKJW1gSPx52qKnl1GI1+ljXBdyPPfSL/s0poCp6oaxcJ1fyXNVP6MJ+ovLhiVn/sqG1DtR8F02cp+CJlcXlt3Yy+nDa9d0ZMT/+wqoEnE7EzWv9Wyop+Cj5vro+X3qYge2+PmFsPx8zjFyUz+HQi/m2f77s3GjurXStLvtxP4Fn+tY6aAOh/cAkGaHnpq7dt6f2C6bs7mrTHaa2tT77Kk8DvnoRNVGCIIBBE2oUmx8l1ZB+nHyNSxAFf6iTweKd1tGWDE0n+yzkmK7ktcHGbqK0LOV56l5zP48Cpsuom8CHbXIFzwWfmPqYmLCOC5D8ptrpxWXVsB8qLerq5qkQPPK4l8FoHW1QLAbPB7dEQDUZOxn2sXHejPPpqOj5OX9sxn7SSGcPzKKd1ENmAk69nU+fEKVuPotyW88wJjuG0Dbm6se11TBOPma4FwQPMTbiZe24gqjQCLW3skUHi+Mzcp9Rxn2OaCsMPPZ+Kb8JQu+cEnoWKSeuet9u48Dgpc6NV7u/54DGtgygrQlL+soZeABc+f0sdpw/HtRF15c15rNXqKtEbejaVOm475qYL8gHSluOIiW2f03SivG1I4LeOs+s8KSE3cyetOEZuT76ZjRcoyqdd921AFjKZB/bkzlJmnT+stX4AkYnbBBNVDnu74Mp2FnBpq01uTaywmiXw9UbY3kbqswuFcEg2ZIhJbMPxW8B9aaaJ3a5mCTwWskVAtgMMewgE64GswoAveCqTJi3fsRR8SOqI7CVenCDPmRvLa99jlZdW4glrp1T/8FhwxBGFxGcp+KjcB+1xRECQJrYTPhFtHNauk6VKvXlPI5aCx9j4axfJEk6Q3zgiNR1RUe5HCxxzo8jjYFbUsSZ4LDT3O62sqGMqPNuFdr0JLiptO+CaCo+xf9Yueh3ig0SIeeGxgy68wyHPGfkQy4THikzgoiLioeBYS3iskx8WROT4ec4PDEHwGBHZOW7/u3oKAy92i1gwvBijsFngQ5oroJlTeaNtW254MbaojETedMJxPn1eBVqsMLxtOEJpJW+3I4cARFuVv/+BZcTaAWxbW+C7ZTfw3TFj/gDC25q4WmXbKQAAAABJRU5ErkJggg==" style="width: 40px">
					    	</div>
					    	<div class="card-title-70">
					    		<span class="ft-16">Visitas</span>
					    		<h2 class="m-5-0">149</h2>
					    	</div>
					    </div>
					    <div class="row">
					    	<span class="detail">Total de visitas de la publicación</span>
					    </div>
					  </div>
					</div>
	        	</div>
	        	<div class="div-card-left">
	        		<div class="card">
					  <div class="card-body p-2">
					    <div>
					    	<div class="card-image-70">
					    		<img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAADIAAAAxCAYAAACYq/ofAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAOsSURBVGhD7Zm5blNBFIbzBHmCPEEeAEILUuiggQJB5wIqpEgU6QCldh+UDgSSCwponIpIKVKwdJZCS7AgUVYv8XK9DPNffJzx5cx6J06E8kt/Yc1dzjdzZubc8Yz4T3QFctkUFaQ3GIp6ty8OWonYbXTEr3pH7Jy0U1drf3/vNbviuJ2IVtIXw+FwdGd+5QZBMAgeAVLQPj6U0J3eYPS0cOUCOen00p7mAvQ1RquVAygIJOkPJ9ImpjFCfZmivvIGQRpxAcQ0OskXxgukJlOJe/F5uFprpyPvKmeQaUKQfWCcQC4CggwYlzSzguAh3Atsrvw8FKWNr6L4rizWPm6Kre0d9joXY87Y9hwrSMjq9PzVezF7/YGYmb8z4YWHy8FAJ+3eKCJeRpCQlCq8XJ0Ifu5WQcxeO4PC7/Ln7+y9NptSTAuCm3xHA2lEAQMI6UVtSK+5m4UxTKV61ubq/dNkFN2/0oI0A/YLBIhA7z0rsu1IKxodpB93jc26uaIF+d3wq53KX7bHo7FuSJ37EtIEa7NurrAgISsVVigC4drJS8XX6TU35MTn2m3elR3MiQWpd/zTSh0R08pEIxIKAnPpxYLsn4aV5JT/6HWuHYA0j4pv19lrXMxVySyI7/wgU9rA2ckMiPm7T9M2rF6h+wnMzRMWJPQbo1I9GAebBix7f/HxSroRqhvk2odN9n5X4ws0KxaEu9nVgKF5kDVSr7Txjb3Px1MBISN1kF6AKrxYlZvl+sQGmcdTBTlPO4Pk/YxFz29t/2DNXe/rY1eQkFULqYQU4qrerDH5UZdxz3FxXRazWbEgRy2/qldXttuMVS1kGeaOj1gQn4JR3TuwPywV36S7PALkjCpYXdVCYJx3dllqsQ/I2lS224xlWC3ruWs47/nUWpDLySGVG6GVLGCoI3RlTdbNpD+KcFJaEOQh9yCyOhq+qaGa0sxlVEzf7loQyLQM0yftbVmCcO2uVkfF1iGm73YjiGlUFh4tpy9HbYXUymMCKX3Sly/oVJz262QEgXRzZfHJyjiAWDaB6OYGyQqCXuBSDGmADRA5HsOmb3gcbNtkBYG6/bBDuhhGJw4sh3OQEwgUcqqS17Z5ocoZBAJMrD92bPaBgLxAIN2ciWkcxLmkkypvEAgwh/JlXBB5jNFuMJWti4JASLGAAFCTm53vKKjKBUIiIN+UQwGIv/LyAJCigKjCUt1KBmk5cSDhECy830zS3wgc7TGCVxUd5KJ0BXLZdAVyuSTEH5KJi1jwEfA0AAAAAElFTkSuQmCC" style="width: 40px">
					    	</div>
					    	<div class="card-title-70">
					    		<span class="ft-16">Usuarios</span>
					    		<h2 class="m-5-0">130</h2>
					    	</div>
					    </div>
					    <div class="row">
					    	<span class="detail" style="letter-spacing: -0.4px;">Total de usuarios que han visto la publicación</span>
					    </div>
					  </div>
					</div>
	        	</div>
	        	<div class="div-card-right">
	        		<div class="card">
					  <div class="card-body p-2">
					    <div>
					    	<div class="card-image-70">
					    		<img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAADAAAAAvCAYAAAClgknJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAMqSURBVGhD7Zm9ThtBFIV5EJ6AvAB1IpEuSZEu6ShChRQpBV0UUbtP5C5SkFykCE2ogkQkKugiUYegBEQc47+1vfZ6mLPxWMvsnZ07M2aNJY50JOzZO77f/M+yJBZc9wBK4/FYdAcj0ejF4rzdF79bfXF61Zsany86g7Q8ikdilIwnkWEKAkDSHZk0EssmyzXiOhImRN4ALZn4WfNmK/saveML4gyArvdtcZvrUew8tJwA0EqzanWT0RvxiA/BBmj2h+QP3pa5Q4oFUHbyyhwIKwBWGaryMnzW7FmHUyEAJtRtj3mbMSewXJtUCKBvRvNyozecZJSXEYA7dCo7X8Xaq22x+mLLyYij6jO5P0wmmd2UEYDT+khiaeWJt99++EzWSxl7DyUSgNv6qy+30kTW370Xtf1jtvE84tATVL0mU71AAnB32uVH62kitW/HZLnJtf2jNA7xVLnJDblT68oBYOWhgimXDYBlVVcOIIoTMpiyDvDjV13+fWS0ivMFgAfavpAD+Bfxd10dQI1tk1GO50IAWvJUkFUOwOWkqQNgVXnwbDP9nnL1y0H6XAiAPg9yAH/a/gBchwBcdiwALrsvBXB48tNo9UwIwIVs4KxmCvC68jH9bLLauO4sABLMJqy7FICFnwOX3bsNYF2FQvYBDBF8B6883TSChQBE2nkoB4ADExVIWQfQJ3Hl014uBg4BGCaWnRjl3FuYDgAfnpxOnX02a1+Ac20CQzkAqN6NyQp0UwAc+wJcETczEoA7jMoG0IcPRAJAnDORAqjufifLTVYAmOhUOWW8taNkBOD0wtrG9rQln7+psI3EEfdY3qWpeilTrQ8ZAaCGZUnFRF1++L8XXI24oomeNTX2lQoBAG07WiCJ6u6BvODvORmXH6o+3fhfQ5EKASB03bxebqHxTENHyQoA4RpXNgQneYgFAJUJwU0eYgNAqNTluO1jHJe5yUNOAEpNuSpQPx5i9G5bu7Bz5AUAoZW4R44iI3EckZOCN9BF8gZQAggScB1aGCroSd/ElYIBsgIMXoxh4/krewdJwrhF4TO+R3lo0lnNFGAeugeYtxYcQIhrqap30z+SMlsAAAAASUVORK5CYII=" style="width: 40px; padding-top: 0px">
					    	</div>
					    	<div class="card-title-70">
					    		<span class="ft-16">Páginas por usuarios</span>
					    		<h2 class="m-5-0">1.27</h2>
					    	</div>
					    </div>
					    <div class="row">
					    	<span class="detail">Promedio de páginas que ve el visitante</span>
					    </div>
					  </div>
					</div>
	        	</div>
        	</div>

        	<div class="pt-15">
        		<div class="div-card-left">
	        		<div class="card">
					  <div class="card-body p-2">
					    <div>
					    	<div class="card-image-70">
					    		<img class="pt-3" src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAADAAAAAyCAYAAAAayliMAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPgSURBVGhD7Vk9TxRBGOYX8Av4BdgrtJpopxZSGO1orEhINKFDY309SqfR5AoKaaCCRBMKhe4SbMULSA7k7jiO+x7nWXzX3bl3Zt+5Xe9Cck/yJJed3Z153s+ZvQl1zTEWMGqMBUTR7vZUvdVRF82OqmqWL9vBb1xrdXp/78oWqQU02l11Um+pYqWhDsqXiTyuNQNxHS02CwwkoNfrqXKjLV60jaWLVmCANPAWAOulXbjJU+3BQT0iFoAJ4H5uAVnwsNpQNZ0rvhAJwOIxATdx1kRo+iBRAKpH1iGTxDNdvaRwChim5U1KPWEVgEozqsUTqwIRVgGoDNxLh8li5TKxOrEC6q0u+0IfFn6eqvzWbkD85u6REJXPBVZAFqEz/XBBTUzfDznzZEnlPm6w9ybR1ez6BNR0o+Je4supO/PBwidvPo4JwXVfIS4v9AnIqlmRgPzWntrZP1C5D5tq6vbVNXAx9459zkabF2ICkDDcw4MwKiB6fTH3fiARZ7qocIgJ8AkfxPT8qxV2DJx5usQKAJffrIUi4BlznCPykkNMgLR0wnKYfPrBAjsOImw2vu2zYyDE4x3IkUJRVqVw3jARE3B0Lot/Co+o9VAqHz3PqdX1z7F7XaSckIZSncmDmADuIZOoIJgUk0evw9q4bgpzkULJ5ckouc4cCoB3uIdMzmkr26wWTVCJiELxJLxfEkZcIocCEF/cQyZdyQn6irBVK444uprwFkATbn79zo6DURGu+0AyiKS5OQVIQ0giAISIGzq2UY24cSIJWF3/wo5Hia8cJmJJLDm43H32WmwxCWmrIQkhZxIDkjJK9dvVxKSEd/AuUJLE3HYiJuB3vc0+GGV+ey+Y0KcB2UgVbVZ3dW7cJA5ZJmICpOcAilvfDVmUsP7kravwkVSrXzo6OMQEIJEleUBeADcSktlGNC88bzZEG7kEBmICgNKFbDtB7kco+YjAlmPuxb9nk6oUkdsHAX0CkCjcC0yii5IVQUk45bd3wzIMrn6S7ZuwybShTwAgPdRABFUlEIujDR32Rjv7P4Lfy2/Xgu13eJ8Om03HTtWkzfoAK0DalYlIwuhpy0UI9jnku6wPsAIANA3uhS4iuedfrqhZXaXgDeI93fyw8/T9OoFDjMv6gFUA8D8/5krYFPwp4hQA8aP6Onee9tMiAS4ctghbzeeQKACACOlxMw3RRPFhwQciAYSKtgw3cRaElyUxb8JLAJC1N2B1GGZQeAsgoGMfpxBCC+8yO0wfDCyAAI8gbku15L9aj6rN4GDu+ljri9QCTMCiiGUsEsTvpGaUBpkLGDbGAkaNay5AqT+txhrJgAB4YAAAAABJRU5ErkJggg==" style="width: 40px">
					    	</div>
					    	<div class="card-title-70">
					    		<span style="font-size:15px; letter-spacing: -0.5px;">Tiempo promedio/visitante</span>
					    		<h2 class="m-5-0">1m 06s</h2>
					    	</div>
					    </div>
					    <div class="row" style="line-height: 80%;">
					    	<span style="font-size: 11px;  opacity: 70%;">Duración media de los visitantes que ven la</span><br>
					    	<span style="font-size: 11px;  opacity: 70%;">publicación</span>
					    </div>
					  </div>
					</div>
	        	</div>
	        	<div class="div-card-left">
	        		<div class="card">
					  <div class="card-body p-2">
					    <div>
					    	<div class="card-image-70">
					    		<img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAADIAAAAxCAYAAACYq/ofAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAARjSURBVGhD7Zm9ThVBFMd5Ap6AJ+ABFFpNoEMLLYh2FFqRkFjQgaG+tSidBhMKCmmggkQTC8WOBFuRCAaQr8uFC/cy7m/hXObOnZmd/eAjhJP8A7s7O3t+M2fOmd3bpm6JXRrI6empqhzX1EG1pvYi7RyexH85d3RSj68XaYWC4OD24bH6s3ekVnYOE/W3XI3b1+r5oXKDMLI7RydqdTfMeZeAYiCyWi4QwiR09EO1cZBthjKBMAtblWOrI0VpL5rlNJYahNEqehZc2o4SRKilArlKCBEzH2LBINcBIQqBCQZZ378eCFHSmgkC2Y06sXV+1fKl50QQQsrWaai+Lv9SU/OLDS393rK2CxFR4bJEEPK6rVOfphYW1cDouGq/36/aOvta1PloUJU+zkaQK9b7fSpHtctmXpDjWt3amUuM9sDr8San2+/1q46HA6r7+XD8V7/GMUC2vlwi4djMC5Km6DG6uqM4PrXww9quNDmnOh5ctAXebOeTba14QUL3TzoEDpoAzBRrRT+HhkofGjBPXpVarru0aUnHThCobZ3YpENI3OP8UOl9Szh1PRtuCidmR66NvJ1unPdpdffw3MsLc4L8q4SlXJzCCR1i9vtyC4Cpnhdjamn1LIMBwDnWk5xLUrXWvLF0grCttnVgShxmZDkGRrKVhJmkXK7p4cTsSD9d0ZriHLMo53wqRy9pujlBQrYjpFlxWM6JQ519g86awYwx+rSTcAKYY86b7W3aNtaJE8R2sylGj4fLQsVBjpGEmUtyLzMq5wRu7tvPprY2mQs+F0jPy7H4wTKq4lxvFP9mW1NLq5sNxwW68/FgfBxSWwoFkTCSB1PNn0azMxfNjLQhvEbeTauJmc+NcyJZX1PzZ+maewsHCakhgMSF79wREWuH2WEx4xiyFT0TRGa4UJA07x6MOg9nrbj2VxMzX5ruIZzkmqRcCS2zrU18XtLNCbJxEJZ+pQYkyawPEkbd5ylYB0tKFKhibFOcILsRsa0DUzyU8BInbBJnRZIUkDjNjHLMzlhv61JwQUyzRUHUAclCpiiWOMyi19cNxZF7uWYWVp9sO2AnCJbmo1tp8mxEbcJRGXEEsL6vkjDTC6tPtnd4L0hoeJkQ+sxIqAyMvokdBkCv+Pr7i4RZklJv40/qya+5JgThItsN5HrXIEXrYRYSUmh9v3ruXbN5QbAtz6suRU4cQRLzSIolNYIZ4H2ELYy5Tpi9iU+txdKlTK+6WDQpzrUizpoQCKd7owLH/7IGTFF3QsMJ+b5vJYJgfFOydUy8M6ImhCmAyUoIOHOdhIhMRai7LAgE84XYVcgVUmLBIAzGWrTQbA+5bJnbEZsFg2DXARMCgaUCwYDJ8tEui/ZT/EaSGkQstFhmEQvb953XZplBMLJIkUmANM8A1TP84psLRIzRywOUB0CsEBAxZojPNBvl5J+o1/aq8ZcQBiEPgFihIKbhIO8NOCvyFbU8dqkgV2l3IDfN7kBumt0SEKX+A5qoCIM2v2XUAAAAAElFTkSuQmCC" style="width: 40px">
					    	</div>
					    	<div class="card-title-70">
					    		<span class="ft-16">Contactar al vendedor</span>
					    		<h2 class="m-5-0">23</h2>
					    	</div>
					    </div>
					    <div class="row">
					    	<span class="detail">Cantidad de clicks dados al botón</span>
					    </div>
					  </div>
					</div>
	        	</div>
	        	<div class="div-card-right">
	        		<div class="card">
					  <div class="card-body p-2">
					    <div>
					    	<div class="card-image-70">
					    		<img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAC4AAAAvCAYAAACc5fiSAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAN5SURBVGhD7Zm7bhNBFIbzBHmCPAEPAKEFCTo6igg6F9BGokiXoLS4JkAHCpKLNDROFSQKCiCdpVAHixDZxvf7Zdh/8VnNjs/snPVu1kTil34lzszufHvm7JnxZE1dU6UGPpvN1GgyU93hRLU8N/pj/2dvNFGD8dRvT1OJwAFU74/Uz9ZAnTf6Tv9qD/z+eMCkWgq840Xyoj1k4aTGQ3S82VhWscARYWl0pcb9JtP4MyACR37+9nKWGzgtNwbj+WgyOcERDUwrN1jarnRH4pc4EhzQaaeGywiSBN4KjouzhiZfdoZzCrus4Jg27qZZue69U1FiwbFwcDfL2qhiNi2AI6/LzegUKX49U4WTb4n9+eycvT8ZqWrL9wXwWs+eIqUfNbX5aEet3XiQmnPPD9ixyNg6cAqBI9rcxWQMgsHWb26p2493EpvgCyen7Hhwudlnox4Cj4o2vDkfbPfVEdse1xSI7fxbtp3cYhanELir/BF4/n2RbY9rAEvAufIYgI8mU/Yi3asCh810CcBbA3cJXCV4zyiNAXil696mrhLcrC4BOPKIu0D3KsGrXuHQFYBL9iUm+JsPn9T6rS3/b7qp6lDV0L1xN6dK5ZrfHgf80vvioisReP7wOARF3n7xLtTfNK2YKwOHAWFav8Zsw+pLbSsDB8Tu66PQg+AzQMhRfVMBX+blpIFhRBM5T591m23HX76HrpeAW1/OmmD/bYIDKLd34A38N6dL5ar/+eGzfGB6UamN+sJxwM1lPwD/1xcgc28egI8dO0MYEcRA957s+/CcMQvUH79zfcgojX4gvOqkj8PZVAAOufK88PHUHyjKAELf/GGRrfGmN+7kQg/LudIJ5zcUAm8Kzk4or/U8hrFHBwhyWl947j/dX+hLRr7r5dFmc58ChcC9bHF+bbOZ8p8eAD8lKeAyyjSnEDgkiTpnAocl0y+17XxxARxRlyxGpgkcaSKZfolt0YYWwCGUHu5GUc7tvUztKx0Zlc4mFhyq9672kNPltuMQ1AoOSVbTq7DtSEJXJDhmKuujOAk0FAlOyiptpNCQCBzCJmfZGu8yqkfUOSEnMTiEtzztvK9729Wp4DzcVCxwUtIHwMwBOKrcubQUOAkD4z9w2ARdtKI3aEiHqvewSIllImwqEbgpAA0nMx+OjIdLA9RUquBZ6j941rqm4Er9Ae/e3cWJnYdYAAAAAElFTkSuQmCC" style="width: 40px; padding-top: 0px">
					    	</div>
					    	<div class="card-title-70">
					    		<span class="ft-16">Envía un mensaje al vendedor</span>
					    		<h2 class="m-5-0">33</h2>
					    	</div>
					    </div>
					    <div class="row">
					    	<span class="detail">Cantidad de clicks dados al botón</span>
					    </div>
					  </div>
					</div>
	        	</div>
        	</div>

        </div>
        <div style="padding: 5px; margin: 5px 25px; border-radius: 5px; background-color: #004380;">
        	<p style="margin: 3px 5px; color: white;">*Todas las estadísticas están basadas en el rango de fecha del reporte.</p>
        </div>
        <div class="p-4" style="padding-top: 15px !important;">
        	<div style="padding: 5px 0px">
		      	<div class="inline-block">
		         	<span class="ft-12">Creado por nauticasales.com</span>
		      	</div>
		      	<div class="right inline-block" style="padding-right: 30px;">
		         	<span class="ft-12">1</span>
		      	</div>
			 </div>
        </div>
    </body>
</html>
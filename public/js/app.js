app = {};
app.host = 'https://api.calciooutfit.com/v1/';
app.handleError = function(data) {
    var message;
    if (typeof data === 'string') {
        message = data;
    } else {
        message = "<ul>";
        $.each(data, function(index, value) {
            message += "<li>" + value + "</li>";
        });
        message += "</ul>";
    }
    return message;
};


app.getParameter = function(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
};

app.updateUrl = function(uri, key, value) {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    }
    else {
        return uri + separator + key + "=" + value;
    }
};

app.loader = function () {
    return $('<div/>').append($('<i/>').addClass('fa fa-spinner fa-5x fa-spin')).addClass('col-md-offset-4 col-md-4 text-center loader-loading');
}

app.removeParam = function(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
};

app.convertToSlug = function(Text) {
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;

};

app.cleanArray = function(actual) {
    var newArray = new Array();
    for (var i = 0; i < actual.length; i++) {
        if (actual[i]) {
            newArray.push(actual[i]);
        }
    }
    return newArray;
}


//Author: Abishek R Srikaanth
//Description: Shorter version of the facebook pixel js file.
//              This will need to be enhanced and feature added as any issues are found.

var queryHelper = (function (y) {

    var ea = 'deep',
        fa = 'shallow';

    function ga() {
        this.list = [];
    }

    ga.prototype = {
        append: function (ia, ja) {
            this._append(encodeURIComponent(ia), ja, ea);
        },
        _append: function (ia, ja, ka) {
            if (Object(ja) !== ja) {
                this._appendPrimitive(ia, ja);
            } else if (ka === ea) {
                this._appendObject(ia, ja);
            } else this._appendPrimitive(ia, ha(ja));
        },
        _appendPrimitive: function (ia, ja) {
            if (ja != null) this.list.push([ia, ja]);
        },
        _appendObject: function (ia, ja) {
            for (var ka in ja)
                if (ja.hasOwnProperty(ka)) {
                    var la = ia + '[' + encodeURIComponent(ka) + ']';
                    this._append(la, ja[ka], fa);
                }
        },
        each: function (ia) {
            var ja = this.list;
            for (var ka = 0, la = ja.length; ka < la; ka++) ia(ja[ka][0], ja[ka][1]);
        },
        toQueryString: function () {
            var ia = [];
            this.each(function (ja, ka) {
                ia.push(ja + '=' + encodeURIComponent(ka));
            });
            return ia.join('&');
        }
    };

    function ha(ia) {
        if (typeof JSON === 'undefined' || JSON === null || !JSON.stringify) {
            return Object.prototype.toString.call(ia);
        } else return JSON.stringify(ia);
    }

    return ga;
})({});

var facebook = {
    url: 'https://www.facebook.com/tr/?',
    version: '2.0',
    queueObj: null,
    createEvent: function (pixelId, event, additional_data) {
        if (pixelId == "" || pixelId == undefined || pixelId == null)
            return;

        var param = new queryHelper();
        param.append('id', pixelId);
        param.append('ev', event);
        param.append('dl', location.href);
        param.append('rl', document.referrer);
        param.append('if', false);
        param.append('ts', new Date().valueOf());
        param.append('v', facebook.version);

        //If additional data is passed, attach them to the data being sent to Facebook
        if (additional_data) {
            param.append('cd', additional_data);
        }

        var data = param.toQueryString();

        //Invoke the facebook calls only if the following event names are triggered.
        //The rest of them are ignored.
        switch (event) {
            case "PageView":
            case "ViewContent":
            case "AddToCart":
            case "InitiateCheckout":
            case "AddPaymentInfo":
            case "Purchase":
                this.createCall(data);
        }
    },
    createCall: function (data) {
        //Creates an iframe to make a GET call to facebook. To prevent CORS errors
        $('<iframe>', {
            src: facebook.url + data,
            frameborder: 0,
            scrolling: 'no',
            width: 0,
            height: 0,
            style:'display:none'
        }).appendTo('body');
    }
};
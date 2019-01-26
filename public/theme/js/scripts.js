save = (data, route, token) => {
    var ajax = $.ajax({
        headers: {
            'X-CSRF-Token': token
        },
        url: route, 
        type: "POST",             
        data: data
    });

    return ajax
}

update = (data, route, token) => {
    var ajax = $.ajax({
        headers: {
            'X-CSRF-Token': token
        },
        url: route, 
        type: "PUT",             
        data: data
    });

    return ajax
}

remove = (data, route, token) => {
    var ajax = $.ajax({
        method: 'DELETE',
        headers: {
            'X-CSRF-Token': token
        },
        url: route,
        dataType: 'JSON',
        cache: false,
        data: {id: data}
    });
    return ajax
}

getHtml = (route) => {
    var ajax = $.ajax({
        method: 'GET',
        url: route
    })

    return ajax
}

saveFormData = (data, route, token) => {
    var ajax = $.ajax({
        headers: {
            'X-CSRF-Token': token
        },
        url: route,
        type: "POST",             
        data: data, 
        contentType: false,      
        cache: false,            
        processData:false
    });

    return ajax
}

editFormData = (data, route, token) => {
    var ajax = $.ajax({
        headers: {
            'X-CSRF-Token': token
        },
        url: route,
        type: "POST",             
        data: data, 
        contentType: false,      
        cache: false,            
        processData:false
    });

    return ajax
}
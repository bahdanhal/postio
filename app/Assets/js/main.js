document.addEventListener("DOMContentLoaded", function(event) {
    document.querySelector('#create-news-form').addEventListener('submit', function(event) {
        event.preventDefault();
    
        const title = document.querySelector('#create-title').value;
        const description = document.querySelector('#create-description').value;
    
        fetch('/post', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                title: title,
                description: description
            })
        })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Something went wrong');
            }
        })
        .then(data => {
            document.querySelector('#all-news-label').removeAttribute('hidden');
            const postElement = document.createElement('div');
            postElement.classList.add('news-item');
            postElement.id = `news-item-${data.id}`;
        
            postElement.innerHTML = `
                <div class="post-content">
                    <h3 id="post-title-${data.id}">${title}</h3>
                    <p class="post-description" id="post-description-${data.id}">${description}</p>
                </div>
                <div class="buttons">
                    <button class="edit-btn" id="edit-btn-${data.id}" data-id="${data.id}">
                        <img src="/Assets/Images/pencil.svg" class="edit-btn-img" alt="pencil">
                    </button>
                    <button class="delete-btn" id="delete-btn-${data.id}" data-id="${data.id}">
                        <img src="/Assets/Images/close.svg" class="delete-btn-img" alt="close">
                    </button>
                </div>
            `;
        
            document.querySelector('.news-items').appendChild(postElement);
            document.querySelector('#delete-btn-' + data.id).addEventListener('click', removePost);
            document.querySelector('#edit-btn-' + data.id).addEventListener('click', openEditForm);
        })
        .catch(error => {
        });
    });

    document.querySelector('#update-news-form').addEventListener('submit', function(event) {
        event.preventDefault();
    
        const id = document.querySelector('.update-news-container').getAttribute('data-id');
        const title = document.querySelector('#update-title').value;
        const description = document.querySelector('#update-description').value;

        fetch('/post', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: id,
                title: title,
                description: description
            })
        })
        .then(response => {
            if (response.ok) {
                return [];
            } else {
                throw new Error('Something went wrong');
            }
        })
        .then(data => {
            const postElement = document.createElement('div');
            postElement.classList.add('news-item');
            postElement.id = `news-item-${id}`;
        
            postElement.innerHTML = `
                <div class="post-content">
                    <h3 id="post-title-${id}">${title}</h3>
                    <p class="post-description" id="post-description-${id}">${description}</p>
                </div>
                <div class="buttons">
                    <button class="edit-btn" id="edit-btn-${id}" data-id="${id}">
                        <img src="/Assets/Images/pencil.svg" class="edit-btn-img" alt="pencil">
                    </button>
                    <button class="delete-btn" id="delete-btn-${id}" data-id="${id}">
                        <img src="/Assets/Images/close.svg" class="delete-btn-img" alt="close">
                    </button>
                </div>
            `;
        
            document.querySelector('#news-item-' + id).replaceWith(postElement);
            document.querySelector('#delete-btn-' + data.id).addEventListener('click', removePost);
            document.querySelector('#edit-btn-' + data.id).addEventListener('click', openEditForm);
        })
        .catch(error => {
        });
    });

    const removePost = function(event) {
        event.preventDefault();
        const id = event.currentTarget.getAttribute("data-id");

        fetch('/post?id=' + id, {
            method: 'DELETE',
        })
        .then(response => {
            if (response.status === 204) {
                document.querySelector('#news-item-' + id).remove();
                
                if (!document.querySelector('.news-item')) {
                    document.querySelector('#all-news-label').hidden = true;
                }
                
                return response.json();
            } else {
                throw new Error('Something went wrong');
            }
        })
        .then(data => {
        })
        .catch(error => {
        });
    };

    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', removePost);
    });

    const openEditForm = function(event) {
        event.preventDefault();
        const id = event.currentTarget.getAttribute("data-id");

        document.querySelector(".create-news-container").hidden = true;
        const updateNewsContainer = document.querySelector(".update-news-container");
        updateNewsContainer.removeAttribute("hidden");
        updateNewsContainer.setAttribute('data-id', id); 
        document.querySelector("#update-title").value = document.querySelector("#post-title-" + id).innerHTML
        document.querySelector("#update-description").value = document.querySelector("#post-description-" + id).innerHTML
    }; 

    document.querySelectorAll('.edit-btn').forEach(function(button) {
        button.addEventListener('click', openEditForm);
    });

    const closeEditForm = function(event) {
        event.preventDefault();

        document.querySelector(".create-news-container").removeAttribute("hidden");
        document.querySelector(".update-news-container").hidden = true;
    }; 
    
    document.querySelector('.close-edit-img').addEventListener('click', closeEditForm);
});

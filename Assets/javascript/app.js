document.addEventListener('DOMContentLoaded', function() {
    const items = [
        { id: 1, title: "&&&&&&", subtitle: "Sleek & Stylish", image: "Assets/images/yoga.png", description: "Embrace the minimalist aesthetics with a focus on sleek lines and neutral color palettes." },
        { id: 2, title: "&&&&&&&&&", subtitle: "Creative & Functional", image: "Assets/images/2000.png", description: "Explore layouts that challenge conventions and enhance user experience." },
        { id: 3, title: "&&", subtitle: "Flexible & Dynamic", image: "Assets/images/2002.png", description: "Crafted for optimal viewing on any device, ensuring a seamless digital experience." },
        { id: 4, title: "&&&&&&&&", subtitle: "Engaging & Intuitive", image: "Assets/images/200.png", description: "Incorporate dynamic elements that encourage user interaction and engagement." },
    ];

    const container = document.getElementById('itemsContainer');

    items.forEach(item => {
        const itemDiv = document.createElement('div');
        itemDiv.className = 'group cursor-pointer rounded-lg overflow-hidden shadow-lg bg-white transform transition duration-500 hover:scale-105 hover:shadow-2xl m-4 border border-gray-200 hover:border-gray-400';
    
        const imageContainerDiv = document.createElement('div');
        imageContainerDiv.className = 'relative h-64 overflow-hidden bg-gray-100'; 
    
       
        const overlayDiv = document.createElement('div');
        overlayDiv.className = 'absolute  inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-opacity duration-500 flex justify-center items-center';
        overlayDiv.innerHTML = `<p class="text-white text-xl font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-500">View Project</p>`;
    
        const img = document.createElement('img');
        img.src = item.image;
        img.alt = item.title;
        img.className = "object-cover w-full h-full transform group-hover:scale-110 transition-all duration-700"; 
    
        imageContainerDiv.appendChild(img);
        imageContainerDiv.appendChild(overlayDiv);
        itemDiv.appendChild(imageContainerDiv);
    
        const textDiv = document.createElement('div');
        textDiv.className = "p-4";
        textDiv.innerHTML = `
            <h3 class="text-lg text-gray-800 font-bold mb-1">${item.title.replace(/&/g, '')}</h3>
            <p class="text-gray-600 text-sm">${item.subtitle}</p>
        `;
        itemDiv.appendChild(textDiv);
    
        itemDiv.onclick = () => showDetailView(item);
        container.appendChild(itemDiv);
    });
    

    function showDetailView(item) {
        const detailView = document.getElementById('detailView');
        detailView.innerHTML = `
            <div class="bg-white rounded-lg shadow-xl p-8 max-w-3xl w-full m-4" onclick="event.stopPropagation()">
                <div style="display: flex; justify-content: center; align-items: center; height:400px;">
                    <img src="${item.image}" alt="${item.title}" class="object-cover" style="max-height: 100%;">
                </div>
                <h3 class="text-2xl font-bold text-gray-800">${item.title}</h3>
                <p class="text-gray-600">${item.description}</p>
                <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors" onclick="hideDetailView()">Close</button>
            </div>
        `;
        detailView.classList.remove('hidden');
        detailView.classList.add('flex');
    }
});

window.hideDetailView = function() {
    const detailView = document.getElementById('detailView');
    detailView.classList.add('hidden');
    detailView.classList.remove('flex');
};

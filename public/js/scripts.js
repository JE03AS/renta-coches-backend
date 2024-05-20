document.addEventListener("DOMContentLoaded", function() {
    fetch("http://localhost:8888/renta-coches-backend/src/controllers/CarController.php")
        .then(response => response.json())
        .then(data => {
            const carsDiv = document.getElementById("cars");
            data.forEach(car => {
                const carElement = document.createElement("div");
                carElement.innerHTML = `
                    <h2>${car.name}</h2>
                    <p>${car.description}</p>
                    <p>Precio por Día: $${car.price_per_day}</p>
                    <p>Disponibilidad: ${car.availability_start} - ${car.availability_end}</p>
                    <img src="${car.image_url}" alt="${car.name}" style="width: 200px; height: auto;">
                `;
                carsDiv.appendChild(carElement);
            });
        });

    const carForm = document.getElementById("carForm");
    carForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(carForm);
        const carData = {
            name: formData.get("name"),
            description: formData.get("description"),
            price_per_day: formData.get("price_per_day"),
            availability_start: formData.get("availability_start"),
            availability_end: formData.get("availability_end"),
            image_url: formData.get("image_url")
        };

        fetch("http://localhost:8888/renta-coches-backend/src/controllers/CarController.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(carData)
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            location.reload();
        });
    });
});

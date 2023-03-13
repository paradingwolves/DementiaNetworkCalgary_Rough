fetch('./events/data.json')
  .then(response => response.json())
  .then(data => {
    // Find the next event based on date
    const now = new Date();
    let nextEvent = null;
    data.forEach(event => {
      const eventDate = new Date(event.date);
      if (eventDate >= now && (nextEvent === null || eventDate < new Date(nextEvent.date))) {
        nextEvent = event;
      }
    });

    if (nextEvent !== null) {
      // Create a Bootstrap card for the next event
      const container = document.querySelector('#insertHere');
      container.classList.add('card', 'my-3');
      const body = document.createElement('div');
      body.classList.add('card-body');
      const name = document.createElement('h5');
      name.classList.add('card-title');
      name.textContent = nextEvent.name;
      body.appendChild(name);
      const date = document.createElement('p');
      date.classList.add('card-text');
      date.textContent = `Date: ${nextEvent.date}`;
      body.appendChild(date);
      const description = document.createElement('p');
      description.classList.add('card-text');
      description.textContent = nextEvent.description;
      body.appendChild(description);
      container.appendChild(body);
      // Add the Bootstrap card to the page
    }
  })
  .catch(error => {
    console.error(error);
  });

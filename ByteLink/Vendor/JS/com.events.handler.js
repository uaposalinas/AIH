  // Función para registrar eventos en la consola
  function logEventDetails(event) {
    const target = event.target;
    const elementDescription = target.tagName + (target.id ? `#${target.id}` : '') + (target.className ? `.${target.className}` : '');
    const eventType = event.type;

    // Obtenemos la pila de llamadas y buscamos la función que desencadenó el evento
    const functionStack = new Error().stack;
    let callingFunction = "No se pudo determinar la función";

    if (functionStack) {
      const stackLines = functionStack.split('\n');
      if (stackLines.length > 2) {
        callingFunction = stackLines[2].trim();
      }
    }

    console.log(`Evento: ${eventType}`);
    console.log(`Elemento: ${elementDescription}`);
    console.log(`Función: ${callingFunction}`);
    console.log('==============================');
  }

  // Función para agregar escuchadores de eventos a todos los elementos
  function addEventListenersToAllElements() {
    const allElements = document.querySelectorAll('*');
    allElements.forEach((element) => {
      const eventTypes = ['click', 'input', 'change', 'transitionend', 'mouseover', 'keydown']; // Agrega más eventos según sea necesario
      eventTypes.forEach((eventType) => {
        element.addEventListener(eventType, logEventDetails);
      });
    });
  }

  // Llamamos a la función para agregar escuchadores de eventos a todos los elementos
  addEventListenersToAllElements();


<head>
    <meta charset="UTF-8">
    <title>CHAT DOG </title>
    <script type="importmap">
        {
          "imports": {
            "@google/generative-ai": "https://esm.run/@google/generative-ai"
          }
        }
    </script>
</head>

<body class="container-body">
    <div class="container-principal">
  
         <h2 class="paquetes__heading"><?php echo $titulo ?></h2>
            <p class="milenyumdog__descripcion">Descubre el Secreto de tu Mascota: ¡Analiza su Raza, Aspecto y Emociones con IA!</p>
            <p class="milenyumdog__descripcion1"> Carga una foto y ¡descubre todo sobre tu peludo amigo!</p>
                 <header class="container-header"></header>
        <div class="form-container">
              
           
            <form id="form">
                <div class="upload-button">
                <label for="fileInput">
                  <img  class= "imagen" src="build/img/cargar.png" alt="Cargar imagen" > 
                </label>
                <input type="file" id="fileInput" multiple accept="image/*" style="display: none;" />
                </div>
                 
                  
                 <button class="boton-content" type="submit">Enviar</button>
               
            </form>

            <div id="thumbnails"></div>
        </div>
        <div class="container">
            <blockquote id="preguntas"></blockquote>
        </div>
    </div>

    <?php
        $preguntasArray = [];  // Crea un nuevo array para almacenar las preguntas
        foreach ($prompts as $prompt) {
            $preguntasArray[] = $prompt->descripcion;  // Agrega la descripción al array
        }
        $preguntasJSON = json_encode($preguntasArray);  // Convierte el array a JSON

    ?> 

    <script type="module">
        import { GoogleGenerativeAI } from "@google/generative-ai";
   
        //para ver las imagenes 

const fileInput = document.getElementById('fileInput');
const thumbnailsContainer = document.getElementById('thumbnails'); // Obtener el contenedor de imágenes

fileInput.addEventListener('change', function(event) {
  const files = event.target.files; // Obtener todos los archivos seleccionados

  for (let i = 0; i < files.length; i++) {
    const file = files[i];

    if (file) {
      const reader = new FileReader();

      reader.onload = function(e) {
        const imgElement = document.createElement('img'); // Crea un nuevo elemento img
        imgElement.src = e.target.result;
        imgElement.classList.add('thumbnail'); // Agrega una clase para estilos
        thumbnailsContainer.appendChild(imgElement); // Añade la imagen al contenedor
        
      }
      reader.readAsDataURL(file);
    }

    
    
  }
});

//Código para eliminar la imagen con un evento CLICK
thumbnailsContainer.addEventListener('click', function(event) {
  if (event.target.tagName === 'IMG') {
    thumbnailsContainer.removeChild(event.target);
  }
});


        // Tu clave de API de Google Gemini
        const API_KEY = 'AIzaSyBEPaWzr5rpab4CsApatKyNj2jxpwVwZfU '; // Reemplaza con tu clave

        const genAI = new GoogleGenerativeAI(API_KEY);

        // Convierte un objeto File a un objeto GoogleGenerativeAI.Part
        async function fileToGenerativePart(file) {
            const base64EncodedDataPromise = new Promise((resolve) => {
                const reader = new FileReader();
                reader.onloadend = () => resolve(reader.result.split(',')[1]);
                reader.readAsDataURL(file);
            
            });
            return {
                inlineData: { data: await base64EncodedDataPromise, mimeType: file.type },
            };
        }

        // Maneja el evento del botón "Enviar"
        
          document.getElementById('form').addEventListener('submit', async (event) => {
            event.preventDefault(); // Previene el envío del formulario por defecto
            // Limpia las respue
            
            // Obtiene la imagen/es del input de archivos
            const fileInputEl = document.getElementById('fileInput');
            const imageParts = await Promise.all(
                [...fileInputEl.files].map(fileToGenerativePart)
            );

            // Crea el modelo Gemini
            const model = genAI.getGenerativeModel({ model: "gemini-1.5-flash" });

            // Preguntas a la IA
 
           const preguntas = <?php echo $preguntasJSON; ?>; // Imprime el JSON en JavaScript

           // Realiza las preguntas una por una
            const preguntasContainer = document.getElementById('preguntas'); // Define preguntasContainer aquí
            let i = 1;
            for (const pregunta of preguntas) {
                const promptText = pregunta;
                const preguntaSpan = document.createElement('p');
                const respuestaSpan = document.createElement('span');

                const result = await model.generateContent([promptText, ...imageParts]);
                const response = await result.response;
                const text = response.text();

                preguntaSpan.textContent = `${i}. ${promptText}`; // Mostrar la pregunta al usuario
                respuestaSpan.textContent = text;

                // Agrega la pregunta y respuesta al contenedor
                preguntasContainer.appendChild(preguntaSpan);
                preguntasContainer.appendChild(respuestaSpan);
                preguntasContainer.appendChild(document.createElement('br')); // Agrega un salto de línea

                i++;
            }
            setTimeout(() => {
           preguntasContainer.innerHTML = ''; 
        }, 30000); // 12000 milisegundos = 2 minutos
           
        });
    </script>
</body>


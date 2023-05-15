
var subtasksContainer = document.getElementById("subtasks");
var addSubtaskButton = document.getElementById("add-subtask");

addSubtaskButton.addEventListener("click", function() {
  var subtaskCount = subtasksContainer.children.length;
  var subtaskTemplate = `
    <div class="subtask">
      <input type="text" id="subtask-name-${subtaskCount}" name="subtask-name[]" placeholder="name subtask">
      <input type="number" id="subtask-hours-${subtaskCount}" name="subtask-hours[]" placeholder="hours">
      <button type="button" class="remove-subtask">Remove</button><br><br>
    </div>
  `;
  subtasksContainer.insertAdjacentHTML("beforeend", subtaskTemplate);
});

subtasksContainer.addEventListener("click", function(event) {
  if (event.target.classList.contains("remove-subtask")) {
    event.target.closest(".subtask").remove();
  }
});
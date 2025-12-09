<?php

    $resultat = mysqli_query($conn,"SELECT * FROM sections");
 ?>
<div id="course-sections-modal" class="course-sections-overlay">
    <div class="course-sections-box">
        <h2>Sections of This Course</h2>
        <ul class="course-sections-list">
            <li>Section 1: Introduction</li>
            <li>Section 2: Basics</li>
            <li>Section 3: Advanced Topics</li>
        </ul>
        <button class="course-sections-close-btn" onclick="closeSectionsModal()">Close</button>
    </div>
</div>

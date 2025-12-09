<!-- Add Section Modal -->
<div id="add-section-modal" class="add-section-overlay">
    <div class="add-section-box">
        <h2>Add New Section</h2>
        <form class="add-section-form">
            <label for="section-title">Section Title</label>
            <input type="text" id="section-title" name="section-title" placeholder="Enter section title">

            <label for="section-desc">Description</label>
            <textarea id="section-desc" name="section-desc" rows="4" placeholder="Enter section description"></textarea>

            <div class="add-section-actions">
                <button type="button" class="add-section-cancel-btn" onclick="closeAddSectionModal()">Cancel</button>
                <button type="submit" class="add-section-save-btn">Save</button>
            </div>
        </form>
    </div>
</div>

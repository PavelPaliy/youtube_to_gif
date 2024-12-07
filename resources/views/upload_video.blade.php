<form action="{{ route("upload_video") }}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Select video to upload:</label>
    <input type="file" name="fileToUpload" id="fileToUpload" required>
    <label>Start time:</label>
    <input type="number" name="startTime" required>
    <label>End time:</label>
    <input type="number" name="endTime" required>
    <input type="submit" value="Upload Video" name="submit">
</form>

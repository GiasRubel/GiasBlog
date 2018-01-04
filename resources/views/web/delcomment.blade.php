<form method="post" action="{{ route('comment.delete', $comment->id) }}" style="margin-top: -20px;">
	{{csrf_field()}}
	{{method_field('DELETE')}}

	<button class="btndel" type="submit">Delete</button>
</form>
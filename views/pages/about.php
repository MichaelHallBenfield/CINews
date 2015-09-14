<div class="row">
	<div class="col-md-12 col-xs-12">
		<h1>My First Code Igniter</h1>
		<p>This page shows my first attempt at creating a web app using the CI framework for PHP.</p>
		<p>This site contains a very basic news page. Users can view an overview which displays all articles (including a section of the first sentence for each article). The user can also click on the article the read the whole item.</p>
		<p>The app also has a basic admin feature where a user can create/delete news items. This is done using CI's built in session class.</p>
	</div>
</div>

<div class="row">
	<div class="col-md-4 col-xs-12">
		<h3>List of Models</h3>
		
		<ul>
			<li>News_model</li>
				<ul>
					<li>Functions:</li>
					<ul>
						<li>public get_news($slug = FALSE)</li>
						<li>public set_news</li>
						<li>public delete_row</li>
					</ul>
				</ul>
			<li>Admin_model</li>
				<ul>
				<li>Functions:</li>
				<ul>
						<li>public check_login</li>
					</ul>
				</ul>
		</ul>
	</div>
	<div class="col-md-4 col-xs-12">
		<h3>List of Views</h3>
		
		<ul>
			<li>Pages/</li>
				<ul>
					<li>About</li>
					<li>Home</li>
				</ul>
			<li>News/</li>
				<ul>
					<li>Create</li>
					<li>Index</li>
					<li>Success</li>
					<li>View</li>
				</ul>
			<li>Admin/</li>
				<ul>
					<li>Delete_success</li>
					<li>Incorrect</li>
					<li>Index</li>
					<li>News</li>
				</ul>
			<li>Templates/</li>
				<ul>
					<li>Footer</li>
					<li>Header</li>
					<li>Nav</li>
				</ul>
		</ul>
	</div>
	<div class="col-md-4 col-xs-12">
		<h3>List of Controllers</h3>
		
		<ul>
			<li>Pages</li>
				<ul>
					<li>Functions:</li>
					<ul>
						<li>public view($page = 'home')</li>
					</ul>
				</ul>
			<li>News</li>
				<ul>
					<li>Functions:</li>
					<ul>
						<li>public index</li>
						<li>public view($slug = NULL)</li>
						<li>public create</li>
					</ul>
				</ul>
			<li>Admin</li>
				<ul>
					<li>Functions:</li>
					<ul>
						<li>public index</li>
						<li>public news</li>
					</ul>
				</ul>
		</ul>
	</div>
</div>

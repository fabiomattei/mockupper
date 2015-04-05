# Mockupper

My attempt to make a framework focused on users, user stories and use cases.

#### My view of a web page

This could be a structure of a general web page. You can recognize the header, the footer, the central part.
The page is plenty of contents: there is a big image in the center, there is a calendar, there is a logo on the top and
there is the usual menu.

![alt tag](http://www.funambolo.net/pentima/general_website.png)

My idea is based on this approach: I can divide a page in many blocks. Each block will be an element of the page.
Each block is indipendent, it can load data from a database indipendently and it cares about his look without 
thinking about the rest of the page.

![alt tag](http://www.funambolo.net/pentima/general_pentima_blocks.png)

Once I divided the page in blocks I can make a class for each block.

For example the following code is from the block for the log in form:

	class LoginForm {
	
		function __construct($formname, $action) {
		    $this->formname  = $formname;
			$this->action    = $action;
		}
	
	    function show() {
	        return '<Form name="'.$this->formname.'" method="post" action="'.$this->action.'">
	       <input type="text" name="username" />
	       <input type="password" name="password" />
	       <input type="submit" value="Log In" />
	    </Form>'; 
	    }
	}

But the idea is that a block should be indipendent, so I should be able to connect a block to a Data Access 
Object (dao) and load some data from a database.
The following code belongs to a block that shows a todo list.

	class TodoListAdministration {
	
		function __construct($editscripturl, $deletescripturl) {
			$this->editscripturl   = $editscripturl;
			$this->deletescripturl = $deletescripturl;
		}
	
	    function show() {
	        $todoDao = new TodoDao();
			$alltodos = $todoDao->getAll();
			$out = '';
			while($row = $alltodos->fetch()) {
			    $out .= $row->id.' '.$row->title.' '.$row->body.' '.
					'<a href="'.$this->editscripturl.'?id='.$row->id.'">Edit</a> '.
					'<a href="'.$this->deletescripturl.'?id='.$row->id.'">Delete</a></br>';
			}
			$out .= '<a href="'.$this->editscripturl.'?id=0">New</a>';
			return $out;
	    }
	}

I know what you are thinking about. HTML code mixed with PHP, that's ugly. Well, I very much prefer having some 
*spaghetti* code (maybe because I'm italian) than having all the code scattered in many different files.

Anyway, it is always possible to separate the code in layers, the following code demostrate how simple is to do that.
The first part is a normal block, the second part is the content of the view file that shows the results 
of the query made inside the block.

	class TodoAdministrationList extends BaseBlock {
	
		function __construct($editscript, $deletescript, $todoDao) {
			$this->editscript   = $editscript;
			$this->deletescript = $deletescript;
			$this->todoDao = $todoDao;
		}
	
	    function show() {
			$this->alltodos = $this->todoDao->getAll();
			require APP_ROOT.'presentation/blocks/todos/templates/adminlist.php';
	    }
	}

	// content of file "adminlist.php" (view)
	
	<?php while($row = $this->alltodos->fetch()) { ?>
		<?php echo $row->id ?> 
		<?php echo $row->title ?> 
		<?php echo $row->body ?> 
		<a href="<?php echo $this->editscript ?>?id=<?php echo $row->id ?>">Edit</a>
		<a href="<?php echo $this->deletescript ?>?id=<?php echo $row->id ?>">Del</a><br />
	<?php } ?>
	<a href="<?php echo $this->editscript ?>?id=0">New</a>

#### Users

Users are the main focus of each application...

##### How do I aggregate al those blocks?

The nice thing of having all these blocks is that is very very easy to load them in a *aggregator*.
I don't have the need of querying the todos in a controller, put them in a variable and then pass the 
variable to the view over and over again. The *block* is indipendent from the rest of application!

Have a look at the following code to see how easy is to structure an *aggregator* in order to populate 
a page with all the blocks I need.

	$this->topcontainer     = array(new Menu());
	$this->leftcontainer    = array(new VerticalMenu());
	$this->centralcontainer = array(new TodoAdministrationList('edittodo', 'deletetodo', new TodoDao()));
	$this->rightcontainer   = array(new Calendar(), 
							  new LoginForm("loginformid", "administration/loginurl"));
	$this->bottomcontainer  = array(new Menu());  // again, this is just an example.

In effect a container is an array of objects that implements a _show()_ method.

A *page* script prepares all containers, it loads the right blocks in the right containers and then it loads 
the right template. At the end of the process the *page* is ready to show the contents to the user.

You can find the *pages* in the folder presentation/pages.

#### Information

##### Templates

A *page* script populates the scaffold of the actual web page. That scaffold is part of the template file.
The template is the structure that allows the programmer to show the blocks he previously loaded, in the position 
he chose.

![alt tag](http://www.funambolo.net/pentima/general_website_containers.png)

Templates are contained in folder presentation/templates.

If you are wondering about how the template code looks like, here it is.

This could be the html code for a template page that contains five containers:

	<html>
	<head>
	<title><?PHP echo isset($this->title) ? $this->title : '' ?></title>
	</head>
	<body>
	  <header>
		<?PHP 
		foreach ($this->topcontainer as $block) {
			echo $block->show();
		} ?>
	  </header>
	  <div>
	    <div>
			<?PHP 
			foreach ($this->leftcontainer as $block) {
				echo $block->show();
			} ?>
		</div>
	    <div>
			<?PHP 
			foreach ($this->centralcontainer as $block) {
				echo $block->show();
			} ?>
		</div>
	    <div>
			<?PHP 
			foreach ($this->rightcontainer as $block) {
				echo $block->show();
			} ?>
		</div>
	  </div>
	  <footer>
	    <div>
			<?PHP 
			foreach ($this->bottomcontainer as $block) {
				echo $block->show();
			} ?>
		</div>
	  </footer>
	</body>
	</html>

Quick and easy, isn't it? :-)

##### Use cases

If the application logic is not part of a model or of a controller any more, we need to put that somewhere else.
Well, I just put that logic in a *usecases* directory that is at the root of the application.
Use cases are the heart of the application, they contains all the bussiness logic and they must be indipendent from the
rest of the application. They have to be indipendent from the presentation layer, they have to be indipendendt from
the database connection layer.

The following code belogs to a use case named UserDeleteTodo.
The name of the class tells you exactly what it does. The code is pretty basic.
UserDeleteTodo receives the id of the todo that it has to delete and it receives the data access object (DAO). 
It does a basic validation, then it calls the delete method of the DAO object.

	class UserDeleteTodo {
	
		function __construct($id, $todoDao) {
			$this->id = $id;
			$this->todoDao = $todoDao;
		}
	
		function performAction() { 
			if (is_numeric($this->id)) {
				$this->todoDao->delete($this->id);
			} else {
				throw new GeneralException('General malfuction!!!');
			}
		}
	
	}

Each use case is under test. The application is deigned for TDD.

	class DeleteTodoTest extends \PHPUnit_Framework_TestCase {
	
		public function test_GivenWrongInput_ThrownGeneralException() {
			$this->setExpectedException('GeneralException');
			$fakedb = new TodoFakeDao();
		    $uc = new DeleteTodo('a', $fakedb);
			$uc->performAction();
		}
	
		public function test_GivenAGoodRequest_RecordDeleted() {
			$fakedb = new TodoFakeDao();
		    $uc = new DeleteTodo(1, $fakedb);
			$uc->performAction();
		    $this->assertSame(0, $fakedb->getSize());
		}
	}

Having the layers completely separated, it is very easy to test the bussiness logic.

##### DAO's 

Yes, I know, nowaday programmers don't like to write queries.
But, as a programmer, I hate to put too many dependencies on my application, the more dependencies you have, 
the more it is easy to have problems.
So I very much prefer to write some code and avoid ORM's.
The DAO's objects are based on PDO, with prepared statements, just to be safe.

	class TodoDao {
	
		function __construct($setting) {
			if ($setting != 'test') { // I check that in order to avoid initialization during testing
				try {      
					$this->DBH = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSERNAME, DBPASSWORD);
					$this->DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch(PDOException $e) {
					$logger = new Logger();
					$logger->write($e->getMessage(), __FILE__, __LINE__);
					throw new GeneralException('General malfuction!!!');
				}
			}
		}
	
		/**
		* Setter made for testing purpose
		*/
		public function setPDO($PDO) {
			$this->DBH = $PDO;
		}
	
		function getById($id) {
			try {
				$STH = $this->DBH->prepare('SELECT id, title, body from todos WHERE id = :id');
				$STH->bindParam(':id', $id);
				$STH->execute();
		
				# setting the fetch mode
				$STH->setFetchMode(PDO::FETCH_OBJ);
				return $STH;
			}
			catch(PDOException $e) {
				$logger = new Logger();
				$logger->write($e->getMessage(), __FILE__, __LINE__);
				throw new GeneralException('General malfuction!!!');
			}
		}
	
		/* more queries */
	}

DAO's too are under test, just to be sure I have not mistyped a query.

	class TodoDaoTest extends PHPUnit_Extensions_Database_TestCase {
	
		/**
		* @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
		*/
		public function getConnection() {
			$schema = 'CREATE TABLE "todos" (
			"id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
			"title" VARCHAR,
			"body" VARCHAR);';
			$pdo = new PDO('sqlite::memory:');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->exec($schema);
			$this->pdo = $pdo;
			return $this->createDefaultDBConnection($pdo, ':memory:');
		}
		
		/**
		* @return PHPUnit_Extensions_Database_DataSet_IDataSet
		*/
		public function getDataSet() {
			return $this->createXMLDataSet(dirname(__FILE__).'/tododataset.xml');
		}
		
		public function test_getById() {
			$dao = new TodoDao('test');
			$dao->setPDO($this->pdo);
			$alltodos = $dao->getById(1);
			if($row = $alltodos->fetch()) {
			    $this->assertEquals('My first todo title', $row->title);
			}
		}
		
		/* more tests */
	}

The fake dataset for testing pouposes is stored in a file.

	<?xml version="1.0" ?>
	<dataset>
	    <table name="todos">
	        <column>id</column>
	        <column>title</column>
	        <column>body</column>
	        <row>
	            <value>1</value>
	            <value>My first todo title</value>
	            <value>My first todo body</value>
	        </row>
	        <row>
	            <value>2</value>
	            <value>My second todo title</value>
	            <value>My second todo body</value>
	        </row>
	    </table>
	</dataset>

#### Tests

The two layers *usecases* and *datastorage* are automatically tested through 
[phpunit](http://phpunit.de/ "phpunit website").

The configuration files is contained in the application root and it is named phpunit.xml.

	<?xml version="1.0" encoding="UTF-8"?>
	<phpunit colors="true">
	    <testsuites>
	        <testsuite name="usecases">
	            <directory>test/usecases/*</directory>
	        </testsuite>
	        <testsuite name="datastorage">
	            <directory>test/datastorage</directory>
	        </testsuite>
	    </testsuites>
	</phpunit>

In order to run the test suites it is mandatory having [phpunit](http://phpunit.de/ "phpunit website")
correctly installed in your system and type the command phpunit in the shell.

This is the only external dependency of this application.

#### Code reusability

I found that once you structured the application this way it is very easy to reuse the code from application to application.
Blocks are indipendent, usecases are indipendent, DAO's are indipendendent.

We all are involvend often in many projects, and we know how often we redo stuff over and over again.
I found this way of structuring the code to promote reusability of code. You can copy in a new application a 
folder cotaining few blocks, for example the todos folder, then you can copy the folder cotaining the 
usecases related to the todos and finally the todo DAO's and make it work very quickly.
To adapt the html part contained in the selected blocks will not take too long.

#### Requirements

Mockupper needs, at least, PHP 5.3.

No special requirements for MySql.

#### About Mockupper

Mockupper is not exactly a framework. Mockupper a is simple implementation of a todo list application.
I put in this application all my ideas, so that you can have a basic working example.
Mockupper has a public page where the todo list is visible and it has a private area for creating, 
modifying and deleting todos.
It is a small complete application.

I made it because I was in need of reorganizing my ideas.

The application is a simple PHP application with a database made of two tables: users, todos.

It includes a library called gump for form validation. (https://github.com/Wixel/GUMP) Thank you guys! :-)

It has a simple implementation for a logging system.

#### The final salute

There is so much to do. I will keep working on this during my spare time.

I hope you will find these ideas useful.

Enjoy!

Fabio
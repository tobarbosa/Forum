<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ListItemController extends Controller
{
    public function createNewItem()
    {
        // return 'teste';
        return view('items');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string',
            'summary' => 'required|string',
            'alternative_titles' => 'string',
            'genres' => 'string',
            'image' => 'image'
        ]);

        $input['user_id'] = User::inRandomOrder()->value('id') ?? User::factory();
        $input['active'] = true;

        $input['image'] = $input['image']->store('cover_image', 'public');
        dd($input);
        ListItem::create($input);

        return Redirect::route('list.items');
    }

    public function show(ListItem $item)
    {
        $item->load('user');
        return view('listItem', [
            'item' => $item
        ]);
    }

    public function index()
    {
        $listItems = ListItem::paginate(10);

        return view('listItems', [
            'listItems' => $listItems
        ]);
    }

    public function indexTeste()
    {
        $listItemAll = ListItem::all();
        $listItem = ListItem::find(1);
        $listItemWhere = ListItem::where('name', 'ex')->orWhere('id', '2')->get();

        // $this->create();
        // $this->update();

        return $listItemWhere->toSql();
    }

    public function create()
    {
        // $newItem = ListItem::create([
        //     'name' => 'tensura', 
        //     'alternative_titles' => 'tensei shitara slime', 
        //     'summary' => 'É sobre um azarado e morre antes de apagar o histórico do computador e reincarna como um slime em outro mundo. Mas para salvação dele, seu amigo q sobreviveu à suas custas, destruiu a máquina, para a salvação de 0 pessoas, já que quem tá morto n liga.', 
        //     'genres' => 'ação, aventura, isekai', 
        //     'image' => 'finge/que/tem/algo/aqui/nada.png', 
        //     'comments' => 'não acredito que vou dizer isso... mas gostei desse troço.', 
        //     'active' => true, 
        //     'users_id' => User::find(2)->id
        // ]);
    }

    public function update()
    {
        $toUpdate = ListItem::find(11);
        $toUpdate->genres .= ' a definir';
        $toUpdate->save();

        $isOk = ListItem::find(11)->update([
            'image' => 'passa/direto/por/aqui/fiu.png'
        ]);

        $input = [
            'users_id' => User::find(5)->id
        ];

        $toUpdate->fill($input);
        $toUpdate->save();
    }

    public function delete()
    {
        $toDelete = ListItem::find(11);
        $toDelete->delete();
    }
}

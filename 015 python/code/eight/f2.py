def damage(skill1, skill2):
    damage1 = skill1 + skill2
    damage2 = skill1 * skill2
    return damage1, damage2


damages = damage(100, 200)

damage1, damage2 = damage(100, 200)

print(type(damages), type(damage1), type(damage2))